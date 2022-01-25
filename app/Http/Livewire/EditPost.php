<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\PostCollaboration;
    use App\Models\PostDetail as PostDetailsModel;
    use App\Utilities\Post as PostUtilities;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Str;
    use Livewire\Component;

    class EditPost extends Component {
        public string $post_type, $summary = '';
        public int $post_id;
        public PostModel $post;
        public PostDetailsModel $post_details;
        public array|null $post_image;
        public array $images = [], $tags = [], $attributes = [], $actions = [], $removed_images = [], $removed_tags = [], $removed_attributes = [], $removed_actions = [];
        public bool $is_collaboration = false;
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
            if ($this->is_collaboration) {
                $polymorphic_type = 'App\Models\PostCollaboration';
                $post_meta = new PostCollaboration();
                $post_meta->user_id = auth()->user()->id;
                $post_meta->post_detail_id = $this->post_details->id;
                $post_meta->summary = $this->summary;
                $post_meta->title = $this->post_details->title;
                $post_meta->description = $this->post_details->description;
                $post_meta->content = $this->post_details->content;
            } else {
                $polymorphic_type = 'App\Models\PostDetail';
                $post_meta = $this->post_details;
            }
            $post_meta->save();
            PostUtilities::SaveMeta($post_meta, $this->images, $this->removed_images, 'image', $polymorphic_type);
            PostUtilities::SaveMeta($post_meta, $this->tags, $this->removed_tags, 'tag', $polymorphic_type);
            PostUtilities::SaveMeta($post_meta, $this->attributes, $this->removed_attributes, 'attribute', $polymorphic_type);
            PostUtilities::SaveMeta($post_meta, $this->actions, $this->removed_actions, 'action', $polymorphic_type);
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
