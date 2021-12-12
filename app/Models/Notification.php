<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Notification extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'message' => null,
            'read' => false,
        ];

        public function User() {
            return $this->hasOne(User::class);
        }
    }
