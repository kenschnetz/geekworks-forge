<?php

    namespace App\Http\Livewire;

    use App\Http\Livewire\Parent\Editable;
    use App\Models\Collection as CollectionModel;
    use Illuminate\Validation\Rule;
    use Livewire\WithPagination;

    class Collection extends Editable {
        use WithPagination;

        public function Mount() {
            if (empty($this->slug)) {
                $this->item = new CollectionModel();
                $this->item->user_id = auth()->user()->id;
                $this->editing = true;
            } else {
                $this->item = CollectionModel::where('slug', $this->slug)->first();
            }
            $this->list_route = 'collections';
            $this->pagination_count = config('app.settings.post_pagination', 20);
            $this->model = 'App\Models\Collection';
        }

        public function Render() {
            $posts = $this->item->Posts();
            return view('livewire.collection', ['posts' => $posts->paginate($this->pagination_count)]);
        }

        protected function Rules() {
            return [
                'item.user_id' => 'required',
                'item.name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('collections', 'name')->ignore(optional($this->item)->id)
                ],
                'item.description' => 'required|string',
                'item.publicly_visible' => 'required|boolean',
            ];
        }
    }
