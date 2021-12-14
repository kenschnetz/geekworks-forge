<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class SystemActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'system_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function System() {
            return $this->belongsTo(System::class);
        }
    }
