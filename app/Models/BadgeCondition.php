<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class BadgeCondition extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'badge_id' => null,
        ];

        public function Badge() {
            return $this->belongsTo(Badge::class);
        }
    }
