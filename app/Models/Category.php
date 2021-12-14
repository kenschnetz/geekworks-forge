<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Category extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'slug' => null,
            'description' => null,
        ];

        public function Posts() {
            return $this->belongsToMany(Post::class, 'collection_posts');
        }
    }
