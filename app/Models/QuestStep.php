<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestStep extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'quest_id' => null,
            'step_index' => null,
            'count' => null,
        ];

        public function Quest() {
            return $this->belongsTo(Quest::class);
        }
    }
