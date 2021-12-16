<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class QuestLine extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'description' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Quests() {
            return $this->hasMany(Quest::class);
        }
    }