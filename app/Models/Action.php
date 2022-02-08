<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Laravel\Scout\Searchable;

    class Action extends Model {
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

        public function PostActions() {
            return $this->hasMany(PostAction::class);
        }

        public function Posts() {
            $related_posts = $this->PostActions()->get();
            $posts = collect();
            foreach($related_posts as $related_post) {
                $posts->add($related_post->PostActionable->Post()->first());
            }
            return $posts;
        }

        /**
         * Get the index name for the model.
         */
        public function SearchableAs() {
            return 'action_index';
        }
    }
