<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Collection extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'slug' => null,
            'description' => null,
            'public' => true,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Posts() {
            return $this->belongsTo(Post::class);
        }
    }
