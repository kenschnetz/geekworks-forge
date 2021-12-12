<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserTagView extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'tag_id' => null,
            'views' => 0,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Tag() {
            return $this->belongsTo(Tag::class);
        }
    }
