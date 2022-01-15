<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailsModel;
    use App\Utilities\Post as PostUtilities;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Str;
    use Livewire\Component;

    class EditPost extends Component {
        public string $post_type;
        public int $post_id;
        public PostModel $post;
        public PostDetailsModel $post_details;
        public array|null $post_image;
        public array $images = [], $tags = [], $attributes = [], $actions = [];
        public array $removed_images = [], $removed_tags = [], $removed_attributes = [], $removed_actions = [];
        protected $listeners = ['RefreshMeta'];

        public function Cancel() {
            redirect()->route('post', ['slug' => $this->post->slug]);
        }

        public function Unpublish() {
            $this->Save(false);
        }

        public function Save($published) {
            $this->validate();
            $this->post->published = $published;
            $this->post->save();
            $this->post_details->save();
            PostUtilities::SaveMeta($this->post_details, $this->images, $this->removed_images, 'image');
            PostUtilities::SaveMeta($this->post_details, $this->tags, $this->removed_tags, 'tag');
            PostUtilities::SaveMeta($this->post_details, $this->attributes, $this->removed_attributes, 'attribute');
            PostUtilities::SaveMeta($this->post_details, $this->actions, $this->removed_actions, 'action');
            redirect()->route('post', ['slug' => $this->post->slug]);
        }

        public function RefreshMeta($name, $selected_items, $removed_items) {
            $this->{Str::plural($name)} = $selected_items;
            $this->{'removed_' . Str::plural($name)} = $removed_items;
            if ($name === 'image') {
                $this->RefreshImage();
            }
        }

        public function RefreshImage($image = null) {
            $this->post_image = $image ?? Arr::first($this->images);
        }
    }
