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
            'description' => null,
            'content' => null,
            'requesting_recommendations' => true,
            'requesting_conversions' => true,
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function Tags() {
            return $this->morphMany(PostTag::class, 'PostTaggable', 'post_taggable_type', 'post_taggable_id');
        }

        public function Attributes() {
            return $this->morphMany(PostAttribute::class, 'PostAttributable', 'post_attributable_type', 'post_attributable_id');
        }

        public function Actions() {
            return $this->morphMany(PostAction::class, 'PostActionable', 'post_actionable_type', 'post_actionable_id');
        }

        public function Images() {
            return $this->belongsToMany(UserImage::class, 'post_images');
        }
    }
