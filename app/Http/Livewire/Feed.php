<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use App\Models\User as UserModel;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Feed extends Component {
        use withPagination;

        public int $pagination_count;
        public string $search_term = '';
        public string|null $list_title;
        public int|null $post_type_id, $system_id, $category_id, $tag_id, $user_id;
        public array $top_posts = [], $top_authors = [], $filters = [];
        public bool $menu_show_systems = false, $menu_show_categories = false, $allow_toggling_post_status = false, $show_drafts = false, $show_moderated = false, $is_feed = true;

        public function Mount() {
            $this->top_posts = PostModel::whereHas('Upvotes')->where('published', true)->where('moderated', false)->with('ActivePostDetails')->withCount('Upvotes')->orderBy('upvotes_count', 'DESC')->take(3)->get()->toArray();
            $this->top_authors = UserModel::whereHas('Posts')->withCount(['Posts' => function($query) {
                return $query->where('published', true)->where('moderated', false);
            }])->with('Character')->orderBy('posts_count', 'DESC')->take(3)->get()->toArray();
            $this->pagination_count = config('app.settings.post_pagination', 20);
        }

        public function Render() {
            return view('livewire.feed', ['posts' => $this->GetPosts()]);
        }

        private function GetPosts() {
            if ($this->show_moderated) {
                $posts = PostModel::where('moderated', true)->orWhere('moderated', false);
            } else {
                $posts = PostModel::where('moderated', false);
            }
            if (!$this->show_drafts) {
                $posts->where('published', true);
            }
            if (!empty($this->post_type_id)) {
                $posts->where('post_type_id', $this->post_type_id);
            }
            if (!empty($this->system_id)) {
                $posts->where('system_id', $this->system_id);
            }
            if (!empty($this->category_id)) {
                $posts->where('category_id', $this->category_id);
            }
            if (!empty($this->user_id)) {
                $posts->where('user_id', $this->user_id);
            }
            if (!empty($this->tag_id)) {
                $posts->whereHas('ActivePostDetails', function($query) {
                    $query->whereHas('Tags', function($query) {
                        $query->where('tag_id', $this->tag_id);
                    });
                });
            }
            return $posts->latest()
                ->whereHas('ActivePostDetails', function($query) {
                    return $query->where('title', 'like', '%' . $this->search_term . '%')
                        ->orWhere('description', 'like', '%' . $this->search_term . '%')
                        ->orWhere('content', 'like', '%' . $this->search_term . '%');
                })->with('ActivePostDetails', 'User')
                ->withCount('Upvotes', 'Comments', 'Views')
                ->paginate($this->pagination_count);
        }
    }
