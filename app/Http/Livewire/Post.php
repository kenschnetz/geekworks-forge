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
        public UserModel $user;
        public array $author, $canons = [], $collections = [];
        public bool|null $upvoted = null, $flagged = null;
        public bool $replying = false, $editing = false;
        public int|null $replying_to_id = null, $editing_comment_id = null;
        public string|null $replying_to_name = null, $replying_to_comment = null;
        public string $comment_content = '';
        protected $listeners = ['RefreshMeta'];

        public function Mount() {
            $post_exists = PostModel::where('slug', $this->slug)->exists();
            if ($post_exists) {
                $post = PostModel::where('slug', $this->slug)->with('Type')->first();
                $this->post_id = $post->id;
                $this->pagination_count = config('app.settings.post_pagination', 20);
                $this->user = auth()->user();
                $this->author = $post->User()->with('Character')->first()->toArray();
                $post_view = PostViewModel::where('user_id', auth()->user()->id)->where('post_id', $this->post_id)->first();
                if (empty($post_view)) {
                    $post_view = new PostViewModel;
                    $post_view->user_id = auth()->user()->id;
                    $post_view->post_id = $this->post_id;
                }
                $post_view->updated_at = Carbon::now();
                $post_view->save();
                $canon_posts = $post->CanonPosts()->get();
                foreach($canon_posts as $canon_post) {
                    $selected_canon = [
                        'id' => $canon_post->id,
                        'name' => $canon_post->Canon->name,
                        'description' => $canon_post->Canon->description,
                    ];
                    $this->canons[$canon_post->Canon->id] = $selected_canon;
                }
                $collection_posts = $post->CollectionPosts()->get();
                foreach($collection_posts as $collection_post) {
                    $selected_collection = [
                        'id' => $collection_post->id,
                        'name' => $collection_post->Collection->name,
                        'description' => $collection_post->Collection->description,
                    ];
                    $this->collections[$collection_post->Collection->id] = $selected_collection;
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

        public function EditComment($id, $comment) {
            $this->editing = true;
            $this->editing_comment_id = $id;
            $this->comment_content = $comment;
        }

        public function ReplyTo($replying_to_id, $replying_to_name, $replying_to_comment) {
            $this->replying = true;
            $this->replying_to_id = $replying_to_id;
            $this->replying_to_name = $replying_to_name;
            $this->replying_to_comment = $replying_to_comment;
        }

        public function ClearCommentForm() {
            $this->replying = false;
            $this->editing = false;
            $this->reset('replying_to_id', 'replying_to_name', 'replying_to_comment', 'editing_comment_id', 'comment_content');
        }

        public function SubmitComment() {
            if (empty($this->editing_comment_id)) {
                $comment = new CommentModel;
            } else {
                $comment = CommentModel::find($this->editing_comment_id);
            }
            $comment->post_id = $this->post_id;
            $comment->user_id = $this->user->id;
            $comment->comment_id = $this->replying_to_id;
            $comment->comment = trim($this->comment_content);
            $comment->save();
            $this->ClearCommentForm();
        }

        public function DeleteComment($id) {
            $comment = CommentModel::find($id);
            if (!empty($comment)) {
                $comment->delete();
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
            $comments = $this->GetComments($post);
            return view('livewire.post', ['post' => $post, 'comments' => $comments]);
        }

        private function GetPost() {
            $post = PostModel::where('id', $this->post_id)->with('ActivePostDetails', 'ActivePostDetails.Tags', 'ActivePostDetails.Attributes', 'ActivePostDetails.Actions')->withCount('Upvotes', 'Comments', 'Views')->first();
            $this->upvoted = UpvoteModel::where('user_id', auth()->user()->id)->where('upvotable_id', $post->id)->exists();
            return $post;
        }

        private function GetComments($post) {
            return $post->Comments()->whereNull('comment_id')->paginate($this->pagination_count, ['*'], 'commentsPage');
        }
    }
