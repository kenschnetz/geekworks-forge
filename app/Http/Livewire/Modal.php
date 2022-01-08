<?php

    namespace App\Http\Livewire;

    use App\Models\Tag as TagModel;
    use App\Models\Attribute as AttributeModel;
    use App\Models\Action as ActionModel;
    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailModel;
    use App\Models\UserImage as UserImageModel;
    use Illuminate\Validation\Rule;
    use Livewire\Component;
    use Log;

    class Modal extends Component {

        // TODO: persisted items are immediately published. Stage these so they only go live if the user publishes them

        public PostModel $post;
        public PostDetailModel $post_details;
        public TagModel|AttributeModel|ActionModel|UserImageModel|null $new_item = null;
        public bool $show = false, $soft_deletes = true, $managing_images = false;
        public int $tab = 0, $pagination_count = 16, $max_allowed_items = 3;
        public array $selected_items = [], $removed_items = [];
        public string|null $title, $modal_name, $search_term = '', $model, $item_id_key, $polymorphic_id_key, $polymorphic_type_key, $polymorphic_type_value, $collection = '';

        protected $listeners = [
            'Show' => 'Show',
            'Close' => 'Close',
        ];

        public function Show() {
            $this->show = true;
        }

        public function CreateItem() {
            $this->validate();
            $this->new_item->save();
            $this->ResetNewItem();
            $this->tab = 0;
        }

        public function Close() {
            $this->PersistRemovedItems();
            $this->PersistAddedItems($this->item_id_key, $this->polymorphic_id_key, $this->polymorphic_type_key);
            $this->show = false;
            if ($this->managing_images) {
                $this->emit('RefreshImage');
            } else {
                $this->emit('RefreshCollection', $this->collection);
            }
            $this->resetPage();
        }

        protected function PersistRemovedItems() {
            foreach ($this->removed_items as $removed_item) {
                (new $this->model)::where($this->item_id_key, $removed_item['id'])->where($this->polymorphic_id_key, $this->post_details->id)->where($this->polymorphic_type_key, $this->polymorphic_type_value)->delete();
            }
        }

        protected function PersistAddedItems($item_id_key, $polymorphic_id_key, $polymorphic_type_key) {
            foreach ($this->selected_items as $selected_item) {
                $model = new $this->model;
                $persisted_item = $model::where($this->item_id_key, $selected_item['id'])
                    ->where($this->polymorphic_id_key, $this->post_details->id)
                    ->where($this->polymorphic_type_key, $this->polymorphic_type_value)
                    ->withTrashed();
                $persisted_item = $persisted_item->first();
                if (empty($persisted_item)) {
                    $persisted_item = (new $this->model($selected_item));
                }
                $persisted_item->$item_id_key = $selected_item['id'];
                $persisted_item->$polymorphic_id_key = $this->post_details->id;
                $persisted_item->$polymorphic_type_key = $this->polymorphic_type_value;
                $persisted_item->deleted_at = null;
                $persisted_item->save();
            }
        }

        public function ToggleItem($item) {
            if (empty($this->selected_items[$item['id']])) {
                if (count($this->selected_items) < $this->max_allowed_items) {
                    $this->AddItem($item);
                }
            } else {
                $this->RemoveItem($item);
            }
        }

        protected function AddItem($item) {
            $this->selected_items[$item['id']] = $item;
            if (!empty($this->removed_items[$item['id']])) {
                $this->RestoreItem($item);
            }
        }

        protected function RestoreItem($item) {
            unset($this->removed_items[$item['id']]);
        }

        protected function RemoveItem($item) {
            unset($this->selected_items[$item['id']]);
            $this->removed_items[$item['id']] = $item;
        }

        protected function Rules() {
            return [
                'new_item.name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique($this->collection, 'name')->ignore(optional($this->new_item)->id)
                ],
                'new_item.description' => 'required|string|max:255',
            ];
        }
    }
