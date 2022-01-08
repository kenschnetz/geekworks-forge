<?php

    namespace App\Http\Livewire;

    use App\Models\Attribute as AttributeModel;
    use Livewire\WithPagination;

    class AttributeModal extends Modal {
        use WithPagination;

        public function Mount() {
            $this->ResetNewItem();
            $this->title = 'Manage Attributes';
            $this->modal_name = 'attribute-modal';
            $selected_attributes = $this->post_details->Attributes()->get();
            foreach($selected_attributes as $selected_attribute) {
                $attribute = [
                    'id' => $selected_attribute->Attribute->id,
                    'name' => $selected_attribute->Attribute->name,
                    'description' => $selected_attribute->Attribute->description,
                    'value' => $selected_attribute->value,
                ];
                $this->selected_items[$attribute['id']] = $attribute;
            }
            $this->max_allowed_items = 6;
            $this->model = 'App\Models\PostAttribute';
            $this->item_id_key = 'attribute_id';
            $this->polymorphic_id_key = 'post_attributable_id';
            $this->polymorphic_type_key =  'post_attributable_type';
            $this->polymorphic_type_value =  'App\Models\PostDetail';
            $this->collection = 'attributes';
        }

        public function ResetNewItem() {
            $this->new_item = new AttributeModel;
        }

        public function Render() {
            $attributes = AttributeModel::where('name', 'like', "%{$this->search_term}%")
                ->orWhere('description', 'like', "%{$this->search_term}%")
                ->latest()
                ->paginate($this->pagination_count);
            return view('livewire.item-management-modal', ['items' => $attributes]);
        }
    }
