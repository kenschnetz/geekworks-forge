<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CanonPost extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'canon_id' => null,
            'post_id' => null,
            'approved' => null,
        ];

        public function Canon() {
            return $this->hasOne(Canon::class);
        }

        public function Post() {
            return $this->hasOne(Post::class);
        }
    }
