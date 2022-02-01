<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostCollaboration extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'post_detail_id' => null,
            'summary' => null,
            'title' => null,
            'title_accepted' => false,
            'description' => null,
            'description_accepted' => false,
            'content' => null,
            'content_accepted' => false,
            'tags_accepted' => false,
            'attributes_accepted' => false,
            'actions_accepted' => false,
            'status' => 'Open',
            'outcome' => null,
        ];

        public static function Boot() {
            parent::Boot();
            PostCollaboration::deleting(function($post_collaboration) {
                foreach ($post_collaboration->tags as $tag) {
                    $tag->delete();
                }
            });
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function PostDetails() {
            return $this->belongsTo(PostDetail::class, 'post_detail_id');
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
