<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_type_id' => null,
            'user_id' => null,
            'post_id' => null,
            'system_id' => null,
            'category_id' => null,
            'published' => false,
            'moderated' => false,
            'allow_conversions' => true,
            'is_art_only' => false,
            'locked_art' => true,
            'locked_canon' => true,
            'is_conversion' => false,
        ];

        public function Type() {
            return $this->belongsTo(PostType::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function ParentPost() {
            return $this->belongsTo(Post::class);
        }

        public function ChildPosts() {
            return $this->hasMany(Post::class);
        }

        public function System() {
            return $this->belongsTo(System::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }
    }
