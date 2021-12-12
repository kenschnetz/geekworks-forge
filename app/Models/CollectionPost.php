<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CollectionPost extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'collection_id' => null,
            'post_id' => null,
        ];

        public function Collection() {
            return $this->hasOne(Collection::class);
        }

        public function Post() {
            return $this->hasOne(Post::class);
        }
    }
