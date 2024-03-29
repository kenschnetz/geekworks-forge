<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Laravel\Scout\Searchable;

    class PostAttribute extends Model {
        use SoftDeletes, Searchable;

        protected $guarded = ['id'];
        protected $attributes = [
            'attribute_id' => null,
            'post_attributable_id' => null,
            'post_attributable_type' => null,
            'value' => '',
        ];

        public function Attribute() {
            return $this->belongsTo(Attribute::class);
        }

        public function PostAttributable() {
            return $this->morphTo(__FUNCTION__, 'post_attributable_type', 'post_attributable_id');
        }

        public function Posts() {
            $related_posts = $this->PostAttributable()->get();
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
            return 'post_attribute_index';
        }
    }
