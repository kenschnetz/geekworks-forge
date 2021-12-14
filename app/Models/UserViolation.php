<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserViolation extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'admin_user_id' => null,
            'post_flag_id' => null,
            'post_comment_flag_id' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Admin() {
            return $this->belongsTo(User::class, 'admin_user_id');
        }

        public function PostFlag() {
            return $this->belongsTo(PostFlag::class);
        }

        public function PostCommentFlag() {
            return $this->belongsTo(PostCommentFlag::class);
        }
    }
