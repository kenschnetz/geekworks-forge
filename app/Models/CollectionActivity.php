<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CollectionActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'collection_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Collection() {
            return $this->belongsTo(Collection::class);
        }
    }
