<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Badge extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
            'badge_image_path' => null,
        ];

        public function Conditions() {
            return $this->hasMany(BadgeCondition::class);
        }

        public function Users() {
            return $this->belongsToMany(User::class, 'user_badges');
        }

        public function UserConditions() {
            return $this->hasMany(UserBadgeCondition::class);
        }
    }
