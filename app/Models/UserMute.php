<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserMute extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'expiration' => null,
            'reason' => null,
        ];

        public function User() {
            return $this->belongsTo('App\Models\User');
        }
    }
