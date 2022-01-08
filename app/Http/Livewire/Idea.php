<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailsModel;
    use App\Models\UserImage as UserImageModel;
    use Illuminate\Database\Eloquent\Collection;
    use Livewire\Component;
    use Str;

    class Idea extends Component {
        public int $post_id;
        public PostModel $post;
        public PostDetailsModel $post_details;
        public UserImageModel|null $post_image;
        public Collection $tags, $attributes, $actions;
        protected $listeners = ['RefreshCollection', 'RefreshImage'];

        public function Mount() {
            $post_exists = PostModel::where('id', $this->post_id)->exists();
            if ($post_exists) {
                $this->post = PostModel::where('id', $this->post_id)->first();
                $this->post_details = $this->post->ActivePostDetails()->first();
            } else {
                abort(404);
            }
            $this->RefreshImage();
            $this->tags = $this->post_details->Tags()->with('Tag')->get();
            $this->attributes = $this->post_details->Attributes()->with('Attribute')->get();
            $this->actions = $this->post_details->Actions()->with('Action')->get();
        }

        public function Save($published) {
            $this->validate();
            $this->post->published = $published;
            $this->post->save();
            $this->post_details->save();
            $this->SaveAttributeValues();
            $this->SaveActionValues();
            redirect()->route('post', ['slug' => $this->post->slug]);
        }

        public function Render() {
            return view('livewire.idea');
        }

        private function SaveAttributeValues() {
            foreach(collect($this->attributes) as $attribute) {
                $attribute->save();
            }
        }

        private function SaveActionValues() {
            foreach($this->actions as $action) {
                $action->save();
            }
        }

        public function RefreshCollection($collection) {
            $Method = Str::ucfirst($collection);
            $relationship = Str::singular($collection);
            $this->$collection = $this->post_details->$Method()->with($relationship)->get();
        }

        public function RefreshImage() {
            $this->post_image = $this->post_details->Images()->first();
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
                'post_details.title' => 'required|string|max:255',
                'post_details.description' => 'nullable|string|max:255',
                'post_details.content' => 'nullable|string',
                'post_details.requesting_recommendations' => 'required|boolean',
                'post_details.requesting_conversions' => 'required|boolean',
                'attributes.*.value' => 'nullable|string|max:255',
                'actions.*.value' => 'nullable|string|max:255',
            ];
        }
    }
