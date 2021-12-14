<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserBadge extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'badge_id' => null,
            'completed_at' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Badge() {
            return $this->belongsTo(Badge::class);
        }
    }
