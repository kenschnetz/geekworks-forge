<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostDetailAttribute extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_detail_id' => null,
            'attribute_id' => null,
            'post_recommendation_id' => null,
            'value' => null,
        ];

        public function PostDetail() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Attribute() {
            return $this->belongsTo(Attribute::class);
        }

        public function PostRecommendation() {
            return $this->belongsTo(PostRecommendation::class);
        }
    }
