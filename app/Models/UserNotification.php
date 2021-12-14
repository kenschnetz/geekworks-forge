<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserNotification extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'message' => null,
            'read_at' => false,
        ];

        public function User() {
            return $this->hasOne(User::class);
        }
    }
