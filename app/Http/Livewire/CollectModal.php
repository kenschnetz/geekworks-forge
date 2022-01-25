<?php

    namespace App\Http\Livewire;

    use App\Models\Collection as CollectionModel;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;
    use Livewire\WithPagination;

    class CollectModal extends PostMetaModal {
        use WithPagination;

        public function Mount() {
            $this->ResetNewItem();
            $this->name = 'collection';
            $this->modal_name = 'collect-modal';
            $this->max_allowed_items = 0;
        }

        public function ResetNewItem() {
            $this->new_item = new CollectionModel;
            $this->new_item->user_id = auth()->user()->id;
        }

        public function Render() {
            $collections = CollectionModel::where(function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->where(function ($query) {
                $query->where('name', 'like', "%{$this->search_term}%")->orWhere('description', 'like', "%{$this->search_term}%");
            })->latest()->paginate($this->pagination_count);
            return view('livewire.post-meta-modal', ['items' => $collections]);
        }

        protected function Rules() {
            return [
                'new_item.user_id' => 'required|integer',
                'new_item.name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique(Str::plural($this->name), 'name')->ignore(optional($this->new_item)->id)
                ],
                'new_item.description' => 'required|string|max:255',
            ];
        }
    }
