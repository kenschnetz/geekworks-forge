<?php

    namespace App\Http\Livewire;

    use App\Models\Comment as CommentModel;
    use App\Models\Post as PostModel;
    use App\Models\PostView as PostViewModel;
    use App\Models\Upvote as UpvoteModel;
    use App\Models\Upvote;
    use Illuminate\Support\Carbon;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Post extends Component {
        use WithPagination;

        public string|null $slug;
        public int|null $post_id;
        public int $pagination_count;
        public bool|null $upvoted = null;
        public bool|null $flagged = null;

        public bool $replying = false;
        public int|null $replying_to_id = null;
        public string|null $replying_to_name = null;
        public string|null $replying_to_comment = null;

        public bool $editing = false;
        public int|null $editing_comment_id = null;
        public string $comment_content = '';

        public function Mount() {
            $post_exists = PostModel::where('slug', $this->slug)->exists();
            if ($post_exists) {
                $this->post_id = PostModel::where('slug', $this->slug)->first()->id;
                $this->pagination_count = config('app.settings.post_pagination', 20);
                $this->user = auth()->user();
                $post_view = PostViewModel::where('user_id', auth()->user()->id)->where('post_id', $this->post_id)->first();
                if (empty($post_view)) {
                    $post_view = new PostViewModel;
                    $post_view->user_id = auth()->user()->id;
                    $post_view->post_id = $this->post_id;
                }
                $post_view->updated_at = Carbon::now();
                $post_view->save();
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
