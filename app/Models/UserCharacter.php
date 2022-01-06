<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserCharacter extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'user_image_id' => null,
            'name' => null,
            'bio' => null,
            'skill' => 0,
            'reputation' => 0,
            'level' => 1,
            'experience' => 0,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function ProfilePhoto() {
            return $this->belongsTo(UserImage::class, 'user_image_id');
        }
    }
