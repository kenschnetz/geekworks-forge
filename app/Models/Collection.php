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
            'publicly_visible' => true,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Posts() {
            return $this->belongsToMany(Post::class, 'collection_posts');
        }
    }
