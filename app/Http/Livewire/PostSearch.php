<?php

    namespace App\Http\Livewire;

    use App\Search\Posts as PostsSearch;
    use Illuminate\Support\Facades\Log;
    use Livewire\Component;
    use Livewire\WithPagination;

    class PostSearch extends Component {
        use WithPagination;
        public string $search_term = '';
        public array $search_terms = [];

        public function AddSearchTerm() {
            if (!empty($this->search_term) && strlen($this->search_term) <= 30) {
                if (!in_array($this->search_term, $this->search_terms)) {
                    array_push($this->search_terms, $this->search_term);
                }
                $this->reset('search_term');
            }
        }

        public function RemoveSearchTerm($index) {
            unset($this->search_terms[$index]);
        }

        public function Render() {
            $posts = collect();
            foreach($this->search_terms as $search_term) {
                $results = PostsSearch::search($search_term)->paginate(20);
                foreach ($results as $result) {
                    if (get_class($result) === 'App\Models\PostDetail') {
                        $post = $result->Post;
                        if (!$posts->contains('id', $post->id)) {
                            $posts->add($post);
                        }
                    } else {
                        foreach ($result->Posts() as $post) {
                            if (!$posts->contains('id', $post->id)) {
                                $posts->add($post);
                            }
                        }
                    }
                }
            }
            return view('livewire.post-search', ['posts' => $posts]);
        }
    }
