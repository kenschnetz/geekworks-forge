<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Flag extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'reviewer_id' => null,
            'flaggable_id' => null,
            'flaggable_type' => null,
            'reason' => null,
            'reviewed_at' => null,
            'reviewer_notes' => null,
            'valid' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Reviewer() {
            return $this->belongsTo(User::class, 'reviewer_id');
        }

        public function Flaggable() {
            return $this->morphTo();
        }
    }
