<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostRecommendation extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_detail_id' => null,
            'user_id' => null,
            'title' => null,
            'title_merged' => null,
            'description' => null,
            'description_merged' => null,
            'content' => null,
            'content_merged' => null,
            'tags_merged' => null,
            'attributes_merged' => null,
            'actions_merged' => null,
        ];

        public function PostDetail() {
            return $this->hasOne(PostDetail::class);
        }

        public function User() {
            return $this->hasOne(User::class);
        }
    }
