<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'quest_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Quest() {
            return $this->belongsTo(Quest::class);
        }
    }
