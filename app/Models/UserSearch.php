<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserSearch extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'value' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
