<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserQuest extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'quest_id' => null,
            'completed_at' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Quest() {
            return $this->belongsTo(Quest::class);
        }

        public function StepsInProgress() {
            return $this->belongsTo(UserQuestStep::class);
        }
    }
