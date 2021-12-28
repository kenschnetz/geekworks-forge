<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserNotification extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'notification' => null,
            'read_at' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
