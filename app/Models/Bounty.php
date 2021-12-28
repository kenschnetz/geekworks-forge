<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Bounty extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'activity_id' => null,
            'name' => null,
            'description' => null,
            'count' => 0,
            'live' => false,
            'begins_at' => null,
            'ends_at' => null,
            'experience_reward' => null,
        ];

        public function Author() {
            return $this->belongsTo(User::class);
        }

        public function Activity() {
            return $this->belongsTo(Activity::class);
        }

    }
