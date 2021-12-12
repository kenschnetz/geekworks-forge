<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'quest_id' => null,
        ];

        public function Quest() {
            return $this->hasOne(Quest::class);
        }

        public function UserConditions() {
            return $this->hasMany(UserQuestCondition::class);
        }
    }
