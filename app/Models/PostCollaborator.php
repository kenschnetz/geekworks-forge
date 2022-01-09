<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostCollaborator extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_id' => null,
            'user_id' => null,
            'post_collaboration_id' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function PostCollaboration() {
            return $this->belongsTo(PostCollaboration::class);
        }
    }
