<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserAchievement extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'achievement_id' => null,
            'completed_at' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Achievement() {
            return $this->belongsTo(Achievement::class);
        }
    }
