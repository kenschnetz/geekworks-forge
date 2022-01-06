<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\PostDetail as PostDetailsModel;
    use App\Models\PostType as PostTypeModel;
    use App\Models\System as SystemModel;
    use App\Models\Category as CategoryModel;
    use App\Utilities\Post as PostUtilities;
    use Illuminate\Database\Eloquent\Collection;
    use Livewire\Component;
    use Livewire\WithPagination;

    class NewPost extends Component {
        use WithPagination;

        public int $step = 0;
        public Collection $post_types;
        public PostModel $post;
        public PostDetailsModel $post_details;
        public string $post_system_name;
        public string $post_category_name;

        public function Mount() {
            $this->post_types = PostTypeModel::all();
            $this->post = new PostModel;
            $this->post->user_id = auth()->user()->id;
            $this->post_details = new PostDetailsModel;
        }

        public function ChooseType($id) {
            $this->post->post_type_id = $id;
            $this->step = 1;
        }

        public function ChooseSystem($id, $name) {
            $this->post->system_id = $id;
            $this->step = 2;
            if ($name !== 'None') {
                $this->post_system_name = $name;
            }
            $this->resetPage('systemPage');
        }

        public function ChooseCategory($id, $name) {
            $this->post->category_id = $id;
            $this->step = 3;
            if ($name !== 'None') {
                $this->post_category_name = $name;
            }
            $this->resetPage('categoryPage');
        }

        public function CreatePost() {
            $this->validate();
            $this->post->slug = PostUtilities::slug($this->post_details->title);
            $this->post->save();
            $this->post_details->post_id = $this->post->id;
            $this->post_details->save();
            return match($this->post->post_type_id) {
                1 => redirect()->route('idea', ['post_id' => $this->post->id]),
                2 => redirect()->route('question', ['post_id' => $this->post->id]),
                3 => redirect()->route('article', ['post_id' => $this->post->id]),
            };
        }

        public function Render() {
            if ($this->step === 1) {
                $systems = $this->post->post_type_id === 1 ? SystemModel::where('id', '!=', 1)->paginate(12, ['*'], 'systemPage') : SystemModel::paginate(4);
            }
            if ($this->step === 2) {
                $categories = $this->post->post_type_id === 1 ? CategoryModel::where('id', '!=', 1)->paginate(12, ['*'], 'categoryPage') : CategoryModel::paginate(4);
            }
            return view('livewire.new-post', ['systems' => $systems ?? [], 'categories' => $categories ?? []]);
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
