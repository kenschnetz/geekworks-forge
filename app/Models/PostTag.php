<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostTag extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'tag_id' => null,
            'post_taggable_id' => null,
            'post_taggable_type' => null,
        ];

        public function Tag() {
            return $this->belongsTo(Tag::class);
        }

        public function PostTaggable() {
            return $this->morphTo(__FUNCTION__, 'post_taggable_type', 'post_taggable_id');
        }

        public function Posts() {
            $related_posts = $this->PostTaggable()->get();
            $posts = collect();
            foreach($related_posts as $related_post) {
                $posts->add($related_post->Post()->first());
            }
            return $posts;
        }
    }
