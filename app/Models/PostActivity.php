<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'post_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Post() {
            return $this->belongsTo(Post::class);
        }
    }
