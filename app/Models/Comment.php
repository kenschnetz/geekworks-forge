<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Comment extends Model {
        use HasFactory;

        protected $fillable = [
            'post_id',
            'user_id',
            'comment_id',
            'content',
            'moderated',
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Comment() {
            return $this->belongsTo(Comment::class);
        }

        public function Replies() {
            return $this->hasMany(Comment::class);
        }

        public function Upvotes() {
            return $this->hasMany(CommentUpvote::class);
        }

        public function Flags() {
            return $this->hasMany(CommentFlag::class);
        }
    }
