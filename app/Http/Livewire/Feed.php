<?php

    namespace App\Http\Livewire;

    use App\Models\Post as PostModel;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Feed extends Component {
        use withPagination;

        public int $pagination_count;
        public string $search_term = '';

        public function Mount() {
            $this->pagination_count =  config('app.settings.post_pagination', 20);
        }

        public function Render() {
            return view('livewire.feed', ['posts' => $this->GetPosts()]);
        }

        private function GetPosts() {
            $posts = PostModel::where('published', true)
                ->where('moderated', false)
                ->whereHas('ActivePostDetails', function($query) {
                    return $query->where('title', 'like', '%' . $this->search_term . '%')
                        ->orWhere('description', 'like', '%' . $this->search_term . '%')
                        ->orWhere('content', 'like', '%' . $this->search_term . '%');
                })->with('ActivePostDetails', 'User')->withCount('Upvotes', 'Comments', 'Views')
                ->paginate($this->pagination_count);
            return $posts;
        }
    }
