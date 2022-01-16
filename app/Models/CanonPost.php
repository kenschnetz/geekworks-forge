<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CanonPost extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'canon_id' => null,
            'post_id' => null,
            'approved' => false,
        ];

        public function Canon() {
            return $this->belongsTo(Canon::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Post() {
            return $this->belongsTo(Post::class);
        }
    }
