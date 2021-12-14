<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserCharacter extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'bio' => null,
            'skill' => 0,
            'reputation' => 0,
            'level' => 1,
            'experience' => 0,
            'profile_image_path' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
