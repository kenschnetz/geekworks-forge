<?php

    namespace App\Http\Livewire;

    use App\Models\Action as ActionModel;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;
    use Livewire\WithPagination;

    class ActionPostMetaModal extends PostMetaModal {
        use WithPagination;

        public function Mount() {
            $this->ResetNewItem();
            $this->name = 'action';
            $this->modal_name = 'action-post-meta-modal';
            $this->max_allowed_items = 6;
        }

        public function ResetNewItem() {
            $this->new_item = new ActionModel;
        }

        public function Render() {
            $actions = ActionModel::where('name', 'like', "%{$this->search_term}%")
                ->orWhere('description', 'like', "%{$this->search_term}%")
                ->latest()
                ->paginate($this->pagination_count, ['*'], $this->name);
            foreach($actions as $action) {
                $action->value = '';
            }
            return view('livewire.post-meta-modal', ['items' => $actions]);
        }

        protected function Rules() {
            return [
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
