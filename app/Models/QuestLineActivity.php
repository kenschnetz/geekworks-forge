<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestLineActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'quest_line_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function QuestLine() {
            return $this->belongsTo(QuestLine::class);
        }
    }
