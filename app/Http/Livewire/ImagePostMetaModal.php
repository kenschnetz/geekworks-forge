<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use App\Models\UserImage as UserImageModel;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Rule;
    use Livewire\WithFileUploads;
    use Livewire\WithPagination;

    class ImagePostMetaModal extends PostMetaModal {
        use WithPagination, WithFileUploads;
        public UserImageModel|null $user_image, $post_image;
        public mixed $uploaded_file = null;
        public int|null $other_user_id;

        public function Mount() {
            $this->ResetNewItem();
            $this->name = 'image';
            $this->modal_name = 'image-post-meta-modal';
            $this->max_allowed_items = 1;
            $this->pagination_count = 9;
            $this->user_image = new UserImageModel;
        }

        public function ResetNewItem() {
            $this->new_item = new UserImageModel;
        }

        public function CreateItem() {
            $this->new_item->filename = $this->uploaded_file->getClientOriginalName();
            $this->validate();
            $path = $this->uploaded_file->store('/public/user-images/' . auth()->user()->id);
            $this->user_image->user_id = auth()->user()->id;
            $this->user_image->name = $this->new_item->name;
            $this->user_image->description = $this->new_item->description;
            $this->user_image->filename = $this->new_item->filename;
            $this->user_image->path = Storage::url($path);
            $this->user_image->save();
            $this->tab = 0;
            $this->reset('new_item', 'uploaded_file');
            $this->ResetNewItem();
            $this->new_item->refresh();
            $this->resetPage();
        }

        public function Render() {
            $user_id = empty($this->other_user_id) ? auth()->user()->id : $this->other_user_id;
            $images = UserImageModel::where('user_id', $user_id)
                ->where(function($query) {
                    $query->where('name', 'like', "%{$this->search_term}%")->orWhere('description', 'like', "%{$this->search_term}%");
                })->latest()
                ->paginate($this->pagination_count);
            return view('livewire.post-meta-modal', ['items' => $images]);
        }

        protected function Rules() {
            return [
                'new_item.name' => 'required|string|max:255',
                'new_item.description' => 'required|string|max:255',
                'new_item.filename' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('user_images', 'filename')->ignore(optional($this->new_item)->id)
                ],
                'uploaded_file' => 'required|image|max:10240',
            ];
        }
    }
