<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestStepCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'quest_step_id' => null,
            'activity_id' => null,
            'condition_index' => null,
            'count' => null,
        ];

        public function QuestStep() {
            return $this->belongsTo(QuestStep::class);
        }

        public function Activity() {
            return $this->belongsTo(Activity::class);
        }
    }
