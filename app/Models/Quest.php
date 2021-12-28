<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Quest extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'quest_line_id' => null,
            'live' => false,
            'name' => null,
            'description' => null,
            'quest_index' => null,
            'experience_reward' => null,
        ];

        public function Author() {
            return $this->belongsTo(User::class);
        }

        public function QuestLine() {
            return $this->belongsTo(QuestLine::class);
        }

        public function QuestSteps() {
            return $this->hasMany(QuestStep::class);
        }

        public function UsersInProgress() {
            return $this->hasMany(UserQuest::class);
        }
    }
