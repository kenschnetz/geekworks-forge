<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Badge extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'achievement_id' => null,
            'image_path' => null,
        ];

        public function Achievement() {
            return $this->belongsTo(Achievement::class);
        }
    }
