<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserMute extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'admin_user_id' => null,
            'reason' => null,
            'expires_at' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function AdminUser() {
            return $this->belongsTo(User::class, 'admin_user_id');
        }
    }
