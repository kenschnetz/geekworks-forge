<?php

    namespace App\Http\Livewire;

    use App\Models\Tag as TagModel;
    use Livewire\WithPagination;

    class TagModal extends Modal {
        use WithPagination;

        public function Mount() {
            // TODO: streamline as much of this as possible
            $this->ResetNewItem();
            $this->title = 'Manage Tags';
            $this->modal_name = 'tag-modal';
            $selected_tags = $this->post_details->Tags()->get();
            foreach($selected_tags as $selected_tag) {
                $tag = [
                    'id' => $selected_tag->Tag->id,
                    'name' => $selected_tag->Tag->name,
                    'description' => $selected_tag->Tag->description,
                    'value' => $selected_tag->value,
                ];
                $this->selected_items[$tag['id']] = $tag;
            }
            $this->max_allowed_items = 6;
            $this->model = 'App\Models\PostTag';
            $this->item_id_key = 'tag_id';
            $this->polymorphic_id_key = 'post_taggable_id';
            $this->polymorphic_type_key =  'post_taggable_type';
            $this->polymorphic_type_value =  'App\Models\PostDetail';
            $this->collection = 'tags';
            $this->soft_deletes = false;
        }

        public function ResetNewItem() {
            $this->new_item = new TagModel;
        }

        protected function PersistAddedItems($item_id_key, $polymorphic_id_key, $polymorphic_type_key) {
            foreach ($this->selected_items as $selected_item) {
                $model = new $this->model;
                $persisted_item = $model::where($this->item_id_key, $selected_item['id'])
                    ->where($this->polymorphic_id_key, $this->post_details->id)
                    ->where($this->polymorphic_type_key, $this->polymorphic_type_value);
                $persisted_item = $persisted_item->first();
                if (empty($persisted_item)) {
                    $persisted_item = (new $this->model($selected_item));
                }
                $persisted_item->$item_id_key = $selected_item['id'];
                $persisted_item->$polymorphic_id_key = $this->post_details->id;
                $persisted_item->$polymorphic_type_key = $this->polymorphic_type_value;
                $persisted_item->save();
            }
        }

        public function Render() {
            $tags = TagModel::where('name', 'like', "%{$this->search_term}%")
                ->orWhere('description', 'like', "%{$this->search_term}%")
                ->latest()
                ->paginate($this->pagination_count);
            return view('livewire.item-management-modal', ['items' => $tags]);
        }
    }
