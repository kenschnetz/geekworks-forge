<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserQuestCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_quest_id' => null,
            'quest_condition_id' => null,
            'progress' => 0,
            'completed' => false,
        ];

        public function UserQuest() {
            return $this->belongsTo(UserQuest::class);
        }

        public function QuestCondition() {
            return $this->belongsTo(QuestCondition::class);
        }
    }
