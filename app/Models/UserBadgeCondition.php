<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserBadgeCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_badge_id' => null,
            'badge_condition_id' => null,
            'progress' => 0,
            'completed' => false,
        ];

        public function UserBadge() {
            return $this->belongsTo(UserBadge::class);
        }

        public function BadgeCondition() {
            return $this->belongsTo(BadgeCondition::class);
        }
    }
