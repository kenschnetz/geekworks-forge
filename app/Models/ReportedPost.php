<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class ReportedPost extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_id' => null,
            'user_id' => null,
            'reason' => null,
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
