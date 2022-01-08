<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Action extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => '',
            'description' => '',
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
