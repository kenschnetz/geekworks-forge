<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class ReportedPostComment extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_comment_id' => null,
            'user_id' => null,
            'reason' => null,
        ];

        public function Comment() {
            return $this->belongsTo(PostComment::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
