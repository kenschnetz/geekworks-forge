<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailModel;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Str;

    class PostMetaModal extends Modal {
        public PostModel $post;
        public PostDetailModel $post_details;
        public array $selected_items, $removed_items;
        public Model|null $new_item = null;
        public int $tab = 0, $pagination_count = 16, $max_allowed_items = 3;

        public function Close() {
            $this->show = false;
            $this->emit('RefreshMeta', $this->name, $this->selected_items, $this->removed_items);
            $this->resetPage();
        }

        public function ToggleItem($item) {
            if (empty($this->selected_items[$item['id']])) {
                if ($this->max_allowed_items === 0 || count($this->selected_items) < $this->max_allowed_items) {
                    if (empty($this->removed_items[$item['id']])) {
                        $this->AddItem($item);
                    } else {
                        $this->RestoreItem($this->removed_items[$item['id']]);
                    }
                }
            } else {
                $this->RemoveItem($this->selected_items[$item['id']]);
            }
        }

        protected function AddItem($item) {
            $this->selected_items[$item['id']] = $item;
        }

        protected function RestoreItem($item) {
            $this->selected_items[$item['id']] = $item;
            unset($this->removed_items[$item['id']]);
        }

        protected function RemoveItem($item) {
            unset($this->selected_items[$item['id']]);
            $this->removed_items[$item['id']] = $item;
        }

        public function CreateItem() {
            if ($this->name === 'tag' || $this->name === 'category' || $this->name === 'canon' || $this->name === 'collection') {
                $this->new_item->slug = Str::plural($this->new_item->name);
            }
            $this->validate();
            $this->new_item->save();
            $this->tab = 0;
            $this->reset('new_item');
            $this->ResetNewItem();
            $this->new_item->refresh();
            $this->resetPage();
        }
    }
