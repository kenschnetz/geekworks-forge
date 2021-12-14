<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostType extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
        ];

        public function Posts() {
            return $this->hasMany(Post::class);
        }
    }
