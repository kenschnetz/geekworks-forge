<?php

    namespace App\Http\Livewire;

    use App\Models\Canon as CanonModel;
    use App\Http\Livewire\Parent\Editable;
    use Illuminate\Validation\Rule;
    use Livewire\WithPagination;

    class Canon extends Editable {
        use WithPagination;

        public function Mount() {
            if (empty($this->slug)) {
                $this->item = new CanonModel();
                $this->item->user_id = auth()->user()->id;
                $this->editing = true;
            } else {
                $this->item = CanonModel::where('slug', $this->slug)->first();
            }
            $this->list_route = 'canons';
            $this->pagination_count = config('app.settings.post_pagination', 20);
            $this->model = 'App\Models\Canon';
        }

        public function Render() {
            $posts = $this->item->Posts();
            if ($this->item->require_approval) {
                $posts->where('approved', true);
            }
            return view('livewire.canon', ['posts' => $posts->paginate($this->pagination_count)]);
        }

        protected function Rules() {
            return [
                'item.user_id' => 'required|integer',
                'item.name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('canons', 'name')->ignore(optional($this->item)->id)
                ],
                'item.description' => 'required|string',
                'item.publicly_visible' => 'required|boolean',
                'item.allow_collaboration' => 'required|boolean',
                'item.require_approval' => 'required|boolean',
            ];
        }
    }
