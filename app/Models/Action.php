<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Action extends Model {
        public $timestamps = false;
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
        ];

        public function Posts() {
            return $this->belongsToMany(Post::class, 'post_actions');
        }
    }
