<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserBan extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'reason' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
