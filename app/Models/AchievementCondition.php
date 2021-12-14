<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class AchievementCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'achievement_id' => null,
            'activity_id' => null,
            'count' => 0,
        ];

        public function Achievement() {
            return $this->belongsTo(Achievement::class);
        }

        public function Activity() {
            return $this->belongsTo(Activity::class);
        }
    }
