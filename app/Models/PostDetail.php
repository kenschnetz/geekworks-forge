<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostDetail extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_id' => null,
            'version' => 1,
            'title' => null,
            'slug' => null,
            'description' => null,
            'content' => null,
            'requesting_recommendations' => true,
        ];

        public function Post() {
            return $this->hasOne(Post::class);
        }

        public function Recommendations() {
            return $this->belongsToMany(PostRecommendation::class);
        }

        public function RecommendationMerges() {
            return $this->belongsToMany(PostRecommendationMerge::class);
        }

        public function Images() {
            return $this->belongsToMany(Image::class, 'post_detail_images');
        }

        public function Tags() {
            return $this->belongsToMany(Tag::class, 'post_detail_tags');
        }

        public function Attributes() {
            return $this->belongsToMany(Attribute::class, 'post_detail_attributes');
        }

        public function Actions() {
            return $this->belongsToMany(Action::class, 'post_detail_actions');
        }
    }
