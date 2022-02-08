<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Laravel\Scout\Searchable;

    class Tag extends Model {
        use Searchable;

        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'description' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Tag() {
            return $this->belongsTo(User::class);
        }

        public function PostTags() {
            return $this->hasMany(PostTag::class);
        }

        public function Posts() {
            $related_posts = $this->PostTags()->get();
            $posts = collect();
            foreach($related_posts as $related_post) {
                $posts->add($related_post->PostTaggable->Post()->first());
            }
            return $posts;
        }

        /**
         * Get the index name for the model.
         */
        public function SearchableAs() {
            return 'tag_index';
        }
    }
