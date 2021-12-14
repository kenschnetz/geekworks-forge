<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CanonPostActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'canon_post_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function CanonPost() {
            return $this->belongsTo(CanonPost::class);
        }
    }
