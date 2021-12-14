<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostCommentFlag extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_comment_id' => null,
            'user_id' => null,
            'reviewer_user_id' => null,
            'reason' => null,
            'reviewed_at' => null,
            'reviewer_notes' => null,
            'valid' => null,
        ];

        public function PostComment() {
            return $this->belongsTo(PostComment::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Reviewer() {
            return $this->belongsTo(User::class, 'reviewer_user_id');
        }
    }
