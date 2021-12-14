<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'quest_id' => null,
            'activity_id' => null,
            'count' => null,
        ];

        public function Quest() {
            return $this->hasOne(Quest::class);
        }

        public function Activity() {
            return $this->hasOne(Activity::class);
        }

        public function UserConditions() {
            return $this->hasMany(UserQuestCondition::class);
        }
    }
