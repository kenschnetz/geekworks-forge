<?php

    namespace App\Http\Livewire;

    use App\Models\Comment;
    use App\Models\Comment as CommentModel;
    use App\Models\Upvote as UpvoteModel;
    use Illuminate\Database\Eloquent\Model;
    use Livewire\Component;
    use Livewire\WithPagination;

    class Comments extends Component {
        use WithPagination;

//        TODO: add upvote feature

        public Model $post, $user;
        public int|null $replying_to_id = null, $editing_id = null;
        public string $new_comment_content = '', $reply_comment_content = '', $edit_comment_content = '';
        public bool $replying;

        public function Mount() {
            $this->user = auth()->user();
            $this->pagination_count = config('app.settings.post_pagination', 20);
        }

        public function Upvote($comment_id) {
            $upvote = new UpvoteModel;
            $upvote->user_id = $this->user->id;
            $upvote->upvotable_id = $comment_id;
            $upvote->upvotable_type = 'App\Models\Comment';
            $upvote->save();
        }

        public function RemoveUpvote($comment_id) {
            CommentModel::find($comment_id)->Upvotes()->where('user_id', $this->user->id)->delete();
        }

        public function SubmitEdit() {
            $this->validate([
               'edit_comment_content' => 'required|string'
            ]);
            $comment = CommentModel::find($this->editing_id);
            $comment->comment = trim($this->edit_comment_content);
            $comment->save();
            $this->reset('edit_comment_content', 'editing_id');
        }

        public function SubmitReply() {
            $this->replying = true;
            $this->validate([
                'reply_comment_content' => 'required|string'
            ]);
            $comment = new CommentModel;
            $comment->post_id = $this->post->id;
            $comment->user_id = $this->user->id;
            $comment->comment_id = $this->replying_to_id;
            $comment->comment = trim($this->reply_comment_content);
            $comment->save();
            $this->reset('reply_comment_content', 'replying_to_id');
            $this->replying = false;
        }

        public function SubmitNewComment() {
            $this->validate([
                'new_comment_content' => 'required|string'
            ]);
            $comment = new CommentModel;
            $comment->post_id = $this->post->id;
            $comment->user_id = $this->user->id;
            $comment->comment = trim($this->new_comment_content);
            $comment->save();
            $this->reset('new_comment_content');
        }

        public function DeleteComment($id) {
            $comment = CommentModel::find($id);
            if (!empty($comment)) {
                $comment->delete();
            }
        }

        public function Render() {
            $comments = $this->post
                ->Comments()
                ->whereNull('comment_id')
                ->with('Upvoted', function($query) {
                    $query->where('user_id', $this->user->id)->exists();
                })->withCount('Upvotes')
                ->latest()
                ->paginate($this->pagination_count, ['*'], 'commentsPage');
            return view('livewire.comments', ['comments' => $comments]);
        }
    }
