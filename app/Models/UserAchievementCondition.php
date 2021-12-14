<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserAchievementCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_achievement_id' => null,
            'achievement_condition_id' => null,
            'completed_at' => null,
        ];

        public function UserAchievement() {
            return $this->belongsTo(UserAchievement::class);
        }

        public function AchievementCondition() {
            return $this->belongsTo(AchievementCondition::class);
        }
    }
