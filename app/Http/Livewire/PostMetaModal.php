<?php

    namespace App\Http\Livewire;

    use App\Models\Tag as TagModel;
    use App\Models\Attribute as AttributeModel;
    use App\Models\Action as ActionModel;
    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailModel;
    use App\Models\UserImage as UserImageModel;
    use Illuminate\Support\Str;
    use Illuminate\Validation\Rule;

    class PostMetaModal extends Modal {
        public PostModel $post;
        public PostDetailModel $post_details;
        public array $selected_items, $removed_items;
        public TagModel|AttributeModel|ActionModel|UserImageModel|null $new_item = null;
        public int $tab = 0, $pagination_count = 16, $max_allowed_items = 3;

        public function Close() {
            $this->show = false;
            $this->emit('RefreshMeta', $this->name, $this->selected_items, $this->removed_items);
            $this->resetPage();
        }

        public function ToggleItem($item) {
            if (empty($this->selected_items[$item['id']])) {
                if (count($this->selected_items) < $this->max_allowed_items) {
                    if (empty($this->removed_items[$item['id']])) {
                        $this->AddItem($item);
                    } else {
                        $this->RestoreItem($this->removed_items[$item['id']]);
                    }
                }
            } else {
                $this->RemoveItem($item);
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
            if ($this->name === 'tag') {
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
