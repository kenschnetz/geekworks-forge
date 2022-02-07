<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Category extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'category_id' => null,
            'name' => null,
            'slug' => null,
            'description' => null,
            'live' => false,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }

        public function Posts() {
            return $this->hasMany(Post::class);
        }
    }
