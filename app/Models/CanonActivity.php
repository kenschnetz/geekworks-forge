<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CanonActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'canon_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Canon() {
            return $this->belongsTo(Canon::class);
        }
    }
