<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class AchievementCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'achievement_id' => null,
        ];

        public function UserConditions() {
            return $this->hasMany(UserAchievementCondition::class);
        }
    }
