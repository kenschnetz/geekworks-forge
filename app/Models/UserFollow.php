<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserFollow extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'followed_user_id' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function FollowedUser() {
            return $this->belongsTo(User::class, 'followed_user_id');
        }
    }
