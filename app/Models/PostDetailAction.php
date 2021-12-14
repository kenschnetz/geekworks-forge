<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostDetailAction extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_detail_id' => null,
            'action_id' => null,
            'post_recommendation_id' => null,
            'value' => null,
        ];

        public function PostDetail() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Action() {
            return $this->belongsTo(Action::class);
        }

        public function PostRecommendation() {
            return $this->belongsTo(PostRecommendation::class);
        }
    }
