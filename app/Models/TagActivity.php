<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class TagActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'tag_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Tag() {
            return $this->belongsTo(Tag::class);
        }
    }
