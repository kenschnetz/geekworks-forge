<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailsModel;
    use Livewire\Component;

    class Idea extends Component {
        public int $post_id;
        public PostModel $post;
        public PostDetailsModel $post_details;

        public function Mount() {
            $post_exists = PostModel::where('id', $this->post_id)->exists();
            if ($post_exists) {
                $this->post = PostModel::where('id', $this->post_id)->first();
                $this->post_details = $this->post->ActivePostDetails()->first();
            } else {
                abort(404);
            }
        }

        public function Save($published) {
            $this->validate();
            $this->post->published = $published;
            $this->post->save();
            $this->post_details->save();
            redirect()->route('post', ['slug' => $this->post->slug]);
        }

        public function Render() {
            return view('livewire.idea');
        }

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
                'post_details.title' => 'required|string',
                'post_details.description' => 'nullable|string',
                'post_details.content' => 'nullable|string',
                'post_details.requesting_recommendations' => 'required|boolean',
                'post_details.requesting_conversions' => 'required|boolean',
            ];
        }
    }