<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Image extends Model {
        use SoftDeletes;

        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'path' => null,
        ];

        public function User() {
            return $this->belongsTo('App\Models\User');
        }

        public function Posts() {
            return $this->belongsToMany(Post::class, 'post_images');
        }
    }
