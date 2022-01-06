<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserImage extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'filename' => null,
            'path' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
