<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserActivityLog extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'loggable_id' => null,
            'loggable_type' => null,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Loggable() {
            return $this->morphTo(); // TODO: add the inverse to Post, Comment, Tag, all touchable models
        }
    }
