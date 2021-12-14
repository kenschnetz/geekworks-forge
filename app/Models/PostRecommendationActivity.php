<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostRecommendationActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'recommendation_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Recommendation() {
            return $this->belongsTo(PostRecommendation::class);
        }
    }
