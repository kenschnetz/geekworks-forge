<?php

    namespace App\Http\Livewire;

    use App\Models\User as UserModel;
    use App\Models\Comment as CommentModel;
    use App\Models\Post as PostModel;
    use App\Models\PostView as PostViewModel;
    use App\Models\Upvote as UpvoteModel;
    use App\Models\Upvote;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Str;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Post extends Component {
        use WithPagination;

        public string|null $slug;
        public int|null $post_id;
        public int $pagination_count;
        public array $author, $canons = [], $collections = [];
        public bool|null $upvoted = null, $flagged = null;
        protected $listeners = ['RefreshMeta'];

        public function Mount() {
            $post_exists = PostModel::where('slug', $this->slug)->exists();
            if ($post_exists) {
                $post = PostModel::where('slug', $this->slug)->with('Type')->first();
                $this->post_id = $post->id;
                $this->pagination_count = config('app.settings.post_pagination', 20);
                $this->author = $post->User()->with('Character')->first()->toArray();
                if (auth()->check()) {
                    $post_view = PostViewModel::where('user_id', auth()->user()->id)->where('post_id', $this->post_id)->first();
                    if (empty($post_view)) {
                        $post_view = new PostViewModel;
                        $post_view->user_id = auth()->user()->id;
                        $post_view->post_id = $this->post_id;
                    }
                    $post_view->updated_at = Carbon::now();
                    $post_view->save();
                    $canon_posts = $post->CanonPosts()->get();
                    foreach ($canon_posts as $canon_post) {
                        $selected_canon = [
                            'id' => $canon_post->id,
                            'name' => $canon_post->Canon->name,
                            'description' => $canon_post->Canon->description,
                        ];
                        $this->canons[$canon_post->Canon->id] = $selected_canon;
                    }
                    $collection_posts = $post->CollectionPosts()->get();
                    foreach ($collection_posts as $collection_post) {
                        $selected_collection = [
                            'id' => $collection_post->id,
                            'name' => $collection_post->Collection->name,
                            'description' => $collection_post->Collection->description,
                        ];
                        $this->collections[$collection_post->Collection->id] = $selected_collection;
                    }
                }
            } else {
                abort(404);
            }
        }

        public function TogglePostUpvote($user_id, $post_id) {
            $upvote = UpvoteModel::where('user_id', $user_id)->where('upvotable_id', $post_id)->first();
            if (!empty($upvote) && $this->upvoted) {
                $upvote->delete();
                $this->upvoted = false;
            } else {
                $upvote = new UpvoteModel;
                $upvote->user_id = $user_id;
                $upvote->upvotable_id = $post_id;
                $upvote->upvotable_type = 'App\Models\Post';
                $upvote->save();
                $this->upvoted = true;
            }
        }

        public function RefreshMeta($name, $selected_items, $removed_items) {
            $this->{Str::plural($name)} = $selected_items;
            $this->{'removed_' . Str::plural($name)} = $removed_items;
            $model = match($name) {
                'canon' => 'App\Models\CanonPost',
                'collection' => 'App\Models\CollectionPost',
            };
            foreach($selected_items as $key => $selected_item) {
                Log::debug(json_encode($selected_item));
                $saved_meta = $model::where($name . '_id', $key)->where('post_id', $this->post_id)->first();
                if (empty($saved_meta)) {
                    $saved_meta = new $model;
                    $saved_meta->user_id = auth()->user()->id;
                    $saved_meta->{$name . '_id'} = $key;
                    $saved_meta->post_id = $this->post_id;
                    if ($name === 'canon' && $selected_item['user_id'] === auth()->user()->id) {
                        $saved_meta->approved = true;
                    }
                    $saved_meta->save();
                }
            }
            foreach($removed_items as $key => $removed_item) {
                $model::where('user_id', auth()->user()->id)->where($name . '_id', $key)->where('post_id', $this->post_id)->delete();
            }
        }

        public function Render() {
            $post = $this->GetPost();
            $has_open_collaboration = auth()->check() ? $post->ActivePostDetails->whereHas('Collaborations', function($query) use($post) {
                $query->where('post_detail_id', $post->ActivePostDetails->id)->where('user_id', auth()->user()->id)->where('status', 'Open');
            })->exists() : false;
            return view('livewire.post', ['post' => $post, 'has_open_collaboration' => $has_open_collaboration]);
        }

        private function GetPost() {
            $post = PostModel::where('id', $this->post_id)->with('ActivePostDetails', 'ActivePostDetails.Tags', 'ActivePostDetails.Attributes', 'ActivePostDetails.Actions')->withCount('Upvotes', 'Comments', 'Views')->first();
            $this->upvoted = auth()->check() ? UpvoteModel::where('user_id', auth()->user()->id)->where('upvotable_id', $post->id)->exists() : false;
            return $post;
        }
    }
