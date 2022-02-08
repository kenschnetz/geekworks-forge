<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Laravel\Scout\Searchable;

    class Attribute extends Model {
        use Searchable;

        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => '',
            'description' => '',
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function PostAttributes() {
            return $this->hasMany(PostAttribute::class);
        }

        public function Posts() {
            $related_posts = $this->PostAttributes()->get();
            $posts = collect();
            foreach($related_posts as $related_post) {
                $posts->add($related_post->PostAttributable->Post()->first());
            }
            return $posts;
        }

        /**
         * Get the index name for the model.
         */
        public function SearchableAs() {
            return 'attribute_index';
        }
    }
