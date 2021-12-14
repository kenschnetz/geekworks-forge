<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Badge extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'achievement_id' => null,
            'user_id' => null,
            'name' => null,
            'description' => null,
            'badge_image_path' => null,
        ];

        public function Achievement() {
            return $this->belongsTo(Achievement::class);
        }

        public function Author() {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function Users() {
            return $this->belongsToMany(User::class, 'user_badges');
        }
    }
