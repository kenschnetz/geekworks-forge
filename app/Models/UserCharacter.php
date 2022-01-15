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
            'level' => 1,
            'experience_points' => 0,
            'skill_points' => 0,
            'reputation_points' => 0,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function ProfilePhoto() {
            return $this->belongsTo(UserImage::class, 'user_image_id');
        }
    }
