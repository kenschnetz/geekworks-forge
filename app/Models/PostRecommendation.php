<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostRecommendation extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_detail_id' => null,
            'user_id' => null,
            'title' => null,
            'title_accepted' => false,
            'description' => null,
            'description_accepted' => false,
            'content' => null,
            'content_accepted' => false,
            'tags_accepted' => false,
            'attributes_accepted' => false,
            'actions_accepted' => false,
        ];

        public function PostDetail() {
            return $this->hasOne(PostDetail::class);
        }

        public function User() {
            return $this->hasOne(User::class);
        }
    }
