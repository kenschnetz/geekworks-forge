<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestLine extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'live' => false,
            'name' => null,
            'description' => null,
        ];

        public function Author() {
            return $this->belongsTo(User::class);
        }

        public function Quests() {
            return $this->hasMany(Quest::class);
        }
    }
