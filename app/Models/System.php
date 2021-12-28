<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class System extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'description' => null,
            'live' => false,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Posts() {
            return $this->hasMany(Post::class);
        }
    }
