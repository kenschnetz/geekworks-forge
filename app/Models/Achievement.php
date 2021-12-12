<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Achievement extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
        ];

        public function Conditions() {
            return $this->hasMany(BadgeCondition::class);
        }

        public function Users() {
            return $this->belongsToMany(User::class, 'user_achievements');
        }

        public function UserConditions() {
            return $this->hasMany(UserAchievementCondition::class);
        }
    }
