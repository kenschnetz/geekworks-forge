<?php

    namespace App\Http\Livewire;

    use App\Models\Attribute as AttributeModel;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;
    use Livewire\WithPagination;

    class AttributePostMetaModal extends PostMetaModal {
        use WithPagination;

        public function Mount() {
            $this->ResetNewItem();
            $this->name = 'attribute';
            $this->modal_name = 'attribute-post-meta-modal';
            $this->max_allowed_items = 6;
        }

        public function ResetNewItem() {
            $this->new_item = new AttributeModel;
        }

        public function Render() {
            $attributes = AttributeModel::where('name', 'like', "%{$this->search_term}%")
                ->orWhere('description', 'like', "%{$this->search_term}%")
                ->latest()
                ->paginate($this->pagination_count);
            foreach($attributes as $attribute) {
                $attribute->value = '';
            }
            return view('livewire.post-meta-modal', ['items' => $attributes]);
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
