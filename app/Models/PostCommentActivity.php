<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostCommentActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'post_comment_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function PostComment() {
            return $this->belongsTo(PostComment::class);
        }
    }
