<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Quest extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'quest_line_id' => null,
            'name' => null,
            'description' => null,
        ];

        public function User() {
            return $this->hasOne(User::class);
        }

        public function QuestLine() {
            return $this->hasOne(QuestLine::class);
        }

        public function Conditions() {
            return $this->hasMany(QuestCondition::class);
        }

        public function Users() {
            return $this->belongsToMany(User::class, 'user_quests');
        }
    }
