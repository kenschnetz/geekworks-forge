<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostRecommendation extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'post_detail_id' => null,
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

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function PostDetails() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Tags() {
            return $this->belongsToMany(Tag::class, 'post_tags');
        }

        public function Attributes() {
            return $this->belongsToMany(Attribute::class, 'post_attributes');
        }

        public function Actions() {
            return $this->belongsToMany(Action::class, 'post_actions');
        }
    }
