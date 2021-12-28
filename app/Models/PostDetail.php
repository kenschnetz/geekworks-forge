<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostDetail extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_id' => null,
            'version' => 1,
            'active' => true,
            'title' => null,
            'slug' => null,
            'description' => null,
            'content' => null,
            'requesting_recommendations' => true,
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function Tags() {
            return $this->morphMany(PostTag::class, 'PostTaggable');
        }

        public function Attributes() {
            return $this->morphMany(PostAttribute::class, 'PostAttributable');
        }

        public function Actions() {
            return $this->morphMany(PostAction::class, 'PostActionable');
        }
    }
