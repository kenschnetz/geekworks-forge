<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Laravel\Scout\Searchable;

    class PostAction extends Model {
        use SoftDeletes, Searchable;

        protected $guarded = ['id'];
        protected $attributes = [
            'action_id' => null,
            'post_actionable_id' => null,
            'post_actionable_type' => null,
            'value' => '',
        ];

        public function Action() {
            return $this->belongsTo(Action::class);
        }

        public function PostActionable() {
            return $this->morphTo(__FUNCTION__, 'post_actionable_type', 'post_actionable_id');
        }

        public function Posts() {
            $related_posts = $this->PostActionable()->get();
            $posts = collect();
            foreach($related_posts as $related_post) {
                $posts->add($related_post->Post()->first());
            }
            return $posts;
        }

        /**
         * Get the index name for the model.
         */
        public function SearchableAs() {
            return 'post_action_index';
        }
    }
