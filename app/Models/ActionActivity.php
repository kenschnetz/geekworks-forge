<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class ActionActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'action_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Action() {
            return $this->belongsTo(Action::class);
        }
    }
