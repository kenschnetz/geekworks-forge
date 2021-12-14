<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class OtherUserActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'other_user_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function OtherUser() {
            return $this->belongsTo(User::class, 'other_user_id');
        }
    }
