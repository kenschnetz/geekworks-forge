<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailsModel;
    use App\Models\PostCollaboration as PostCollaborationModel;
    use App\Utilities\Post as PostUtilities;
    use Illuminate\Validation\Rule;
    use Livewire\Component;

    class Collaborate extends Component {
        public string $post_type, $summary = '';
        public int $post_id;
        public PostModel $post;
        public PostDetailsModel $post_details;
        public array|null $post_image;
        public array $images = [], $tags = [], $attributes = [], $actions = [], $removed_images = [], $removed_tags = [], $removed_attributes = [], $removed_actions = [];
        public bool $is_collaboration = true;
        protected $listeners = ['RefreshMeta'];

        public function Mount() {
            $post_exists = PostModel::where('id', $this->post_id)->exists();
            if ($post_exists) {
                $this->post = PostModel::where('id', $this->post_id)->first();
                $this->post_details = $this->post->ActivePostDetails()->first();
            } else {
                abort(404);
            }
            $this->images = PostUtilities::GetMeta($this->post_details, 'image');
            $this->removed_images = [];
            $this->tags = PostUtilities::GetMeta($this->post_details, 'tag');
            $this->removed_tags = [];
            $this->attributes = PostUtilities::GetMeta($this->post_details, 'attribute');
            $this->removed_attributes = PostUtilities::GetMeta($this->post_details, 'attribute', true);
            $this->actions = PostUtilities::GetMeta($this->post_details, 'action');
            $this->removed_actions = PostUtilities::GetMeta($this->post_details, 'action', true);
            $this->post_type = 'idea';
        }

        public function Cancel() {
            redirect()->route('post', ['slug' => $this->post->slug]);
        }

        public function Submit() {
            $this->validate();
            $post_collaboration = new PostCollaborationModel($this->post_details->toArray());
            $post_collaboration->user_id = auth()->user()->id;
            $post_collaboration->post_detail_id = $this->post_details->id;
            $post_collaboration->summary = $this->summary;
            $post_collaboration->save();
            redirect()->route('post', ['slug' => $this->post->slug]);
        }

//        public function RefreshMeta($name, $selected_items, $removed_items) {
//            $this->{Str::plural($name)} = $selected_items;
//            $this->{'removed_' . Str::plural($name)} = $removed_items;
//        }

        public function Render() {
            return view('livewire.edit-post');
        }

        // TODO: add custom error messages
        protected function Rules() {
            return [
                'post.post_type_id' => 'required|integer',
                'post.user_id' => 'required|integer',
                'post.system_id' => 'required|integer',
                'post.category_id' => 'required|integer',
                'post.published' => 'required|boolean',
                'post.moderated' => 'required|boolean',
                'post.allow_conversions' => 'required|boolean',
                'post.is_art_only' => 'required|boolean',
                'post_details.title' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('post_details', 'title')->ignore(optional($this->post_details)->id)
                ],
                'post_details.description' => 'nullable|string|max:255',
                'post_details.content' => 'nullable|string',
                'post_details.requesting_recommendations' => 'required|boolean',
                'post_details.requesting_conversions' => 'required|boolean',
                'summary' => 'required|string|max:255'
            ];
        }
    }
