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
        public string $system_search_term = '', $category_search_term = '';
        public bool $choose_sub_category = false;

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
            if (CategoryModel::find($id)->Categories()->count() > 0) {
                $this->choose_sub_category = true;
            } else {
                $this->step = 3;
            }
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
            $pagination_count = 12;
            if ($this->step === 1) {
                $systems = $this->GetPostParentMeta('App\Models\System', $this->system_search_term, $this->post->post_type_id, $pagination_count, 'systemPage');
            }
            if ($this->step === 2) {
                $categories = $this->GetPostParentMeta('App\Models\Category', $this->category_search_term, $this->post->post_type_id, $pagination_count, 'categoryPage', 'category_id');
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
                'post_details.requesting_collaborations' => 'required|boolean',
                'post_details.requesting_conversions' => 'required|boolean',
            ];
        }

        private function GetPostParentMeta($model, $search_term, $post_type_id, $pagination_count, $pagination_term, $null_column_name = null) {
            $parent_metas = $model::where(function($query) use($search_term, $post_type_id, $pagination_count) {
                $query->where('name', 'LIKE', '%' . $search_term . '%')->orWhere('description', 'LIKE', '%' . $search_term . '%');
            });
            if ($post_type_id === 1) {
                $parent_metas = $parent_metas->where('id', '!=', 1);
            }
            if (!empty($null_column_name)) {
                $parent_metas = $parent_metas->whereNull($null_column_name);
            }
            return $parent_metas->paginate($pagination_count, ['*'], $pagination_term);
        }
    }
