<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Upvote extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'upvotable_id' => null,
            'upvotable_type' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Upvotable() {
            return $this->morphTo();
        }
    }
