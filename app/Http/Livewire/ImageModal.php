<?php

    namespace App\Http\Livewire;

    use App\Models\PostImage as PostImageModel;
    use App\Models\User as UserModel;
    use App\Models\UserImage as UserImageModel;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Rule;
    use Livewire\WithFileUploads;
    use Livewire\WithPagination;

    class ImageModal extends Modal {
        use WithPagination, WithFileUploads;
        public UserImageModel $user_image;
        public $uploaded_file;

        public function Mount() {
            // TODO: streamline as much of this as possible
            $this->ResetNewItem();
            $this->title = 'Manage Images';
            $this->modal_name = 'image-modal';
            $selected_images = $this->post_details->Images()->get();
            foreach($selected_images as $selected_image) {
                $image = [
                    'id' => $selected_image->id,
                    'name' => $selected_image->name,
                    'description' => $selected_image->description,
                ];
                $this->selected_items[$image['id']] = $image;
            }
            $this->max_allowed_items = 1;
            $this->pagination_count = 9;
            $this->model = 'App\Models\UserImage';
            $this->item_id_key = 'image_id';
            $this->polymorphic_id_key = '';
            $this->polymorphic_type_key = '';
            $this->polymorphic_type_value = '';
            $this->collection = 'user_images';
            $this->soft_deletes = false;
            $this->managing_images = true;
            $this->user_image = new UserImageModel;
        }

        public function ResetNewItem() {
            $this->new_item = new UserImageModel;
        }

        protected function PersistAddedItems($item_id_key, $polymorphic_id_key, $polymorphic_type_key) {
            foreach ($this->selected_items as $selected_item) {
                $new_post_image = new PostImageModel;
                $new_post_image->post_detail_id = $this->post_details->id;
                $new_post_image->user_image_id = $selected_item['id'];
                $new_post_image->save();
            }
        }

        protected function PersistRemovedItems() {
            foreach ($this->removed_items as $removed_item) {
                PostImageModel::where('post_detail_id', $this->post_details->id)->where('user_image_id', $removed_item['id'])->delete();
            }
        }

        public function CreateItem() {
            $this->validate();
            $path = $this->uploaded_file->store('/public/user-images/' . Auth::id());
            $this->user_image->user_id = auth()->user()->id;
            $this->user_image->name = $this->new_item->name;
            $this->user_image->description = $this->new_item->description;
            $this->user_image->filename = $this->uploaded_file->getClientOriginalName();
            $this->user_image->path = Storage::url($path);
            $this->user_image->save();
            $this->ResetNewItem();
            $this->tab = 0;
        }

        public function Render() {
            $images = UserModel::find(auth()->user()->id)
                ->Images()
                ->where('name', 'like', "%{$this->search_term}%")
                ->orWhere('description', 'like', "%{$this->search_term}%")
                ->latest()
                ->paginate($this->pagination_count);
            return view('livewire.item-management-modal', ['items' => $images]);
        }

        protected function Rules() {
            return [
                'new_item.name' => 'required|string|max:255',
                'new_item.description' => 'required|string|max:255',
                'uploaded_file' => [
                    'required',
                    'image',
                    'max:10240',
                    Rule::unique($this->collection, 'filename')->ignore(optional($this->new_item)->id)
                ],
            ];
        }
    }
