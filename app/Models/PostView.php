<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostView extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_id' => null,
            'user_id' => null,
            'count' => 0,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Post() {
            return $this->belongsTo(Post::class);
        }
    }
