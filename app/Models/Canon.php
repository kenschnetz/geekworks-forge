<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Canon extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'slug' => null,
            'description' => null,
            'public' => false,
        ];

        public function Posts() {
            return $this->belongsToMany(Post::class, 'canon_posts');
        }
    }
