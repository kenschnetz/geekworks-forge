<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Activity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
        ];

        public function UserActivities() {
            return $this->hasMany(UserActivity::class);
        }

        public function QuestStepConditions() {
            return $this->hasMany(QuestStepCondition::class);
        }

        public function Achievements() {
            return $this->hasMany(Achievement::class);
        }
    }
