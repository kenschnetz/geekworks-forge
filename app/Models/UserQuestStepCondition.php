<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserQuestStepCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_quest_step_id' => null,
            'quest_step_condition_id' => null,
            'count' => null,
            'completed_at' => null,
        ];

        public function UserQuestStep() {
            return $this->belongsTo(UserQuestStep::class);
        }

        public function QuestStepCondition() {
            return $this->belongsTo(QuestStepCondition::class);
        }
    }
