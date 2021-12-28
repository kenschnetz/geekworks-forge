<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Achievement extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'activity_id' => null,
            'name' => null,
            'description' => null,
            'experience_reward' => null,
        ];

        public function Activity() {
            return $this->belongsTo(Activity::class);
        }
    }
