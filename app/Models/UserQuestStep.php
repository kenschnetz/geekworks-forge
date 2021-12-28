<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserQuestStep extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_quest_id' => null,
            'quest_step_id' => null,
            'count' => null,
            'completed_at' => null,
        ];

        public function UserQuest() {
            return $this->belongsTo(UserQuest::class);
        }

        public function QuestStep() {
            return $this->belongsTo(QuestStep::class);
        }

        public function QuestStepConditions() {
            return $this->belongsTo(UserQuestStepCondition::class);
        }
    }
