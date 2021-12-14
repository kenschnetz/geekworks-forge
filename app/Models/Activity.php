<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Activity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'description' => null,
            'track_daily' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
