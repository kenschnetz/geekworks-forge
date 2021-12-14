<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostDetailTag extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_detail_id' => null,
            'tag_id' => null,
            'post_recommendation_id' => null,
        ];

        public function PostDetail() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Tag() {
            return $this->belongsTo(Tag::class);
        }

        public function PostRecommendation() {
            return $this->belongsTo(PostRecommendation::class);
        }
    }
