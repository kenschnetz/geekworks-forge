<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Achievement extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'description' => null,
            'experience_points_awarded' => null,
        ];

        public function Users() {
            return $this->belongsToMany(User::class, 'user_achievements');
        }

        public function UserConditions() {
            return $this->hasMany(UserAchievementCondition::class);
        }
    }
