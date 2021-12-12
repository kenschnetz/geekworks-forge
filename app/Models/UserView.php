<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserView extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'viewed_user_id' => null,
            'views' => 0,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function ViewedUser() {
            return $this->belongsTo(User::class, 'viewed_user_id');
        }
    }
