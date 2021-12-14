<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'activity_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Activity() {
            return $this->belongsTo(Activity::class);
        }
    }
