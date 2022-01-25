<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Utilities\Post as PostUtilities;
    use Illuminate\Validation\Rule;
    use Livewire\Component;

    class Article extends EditPost {

        public function Mount() {
            $post_exists = PostModel::where('id', $this->post_id)->exists();
            if ($post_exists) {
                $this->post = PostModel::where('id', $this->post_id)->first();
                $this->post_details = $this->post->ActivePostDetails()->first();
            } else {
                abort(404);
            }
            $this->tags = PostUtilities::GetMeta($this->post_details, 'tag');
            $this->removed_tags = [];
            $this->images = PostUtilities::GetMeta($this->post_details, 'image');
            $this->removed_images = [];
            $this->post_type = 'article';
        }

        public function Render() {
            return view('livewire.edit-post');
        }

        // TODO: add custom error messages
        protected function Rules() {
            $rules = [
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
                'tags' => 'required|array|min:3',
            ];
            if ($this->is_collaboration) {
                $rules['summary'] = 'required|string|max:255';
            }
            return $rules;
        }
    }
