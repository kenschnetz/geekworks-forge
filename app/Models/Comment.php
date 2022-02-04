<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Comment extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_id' => null,
            'user_id' => null,
            'comment_id' => null,
            'comment' => null,
            'moderated' => false,
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Comment() {
            return $this->belongsTo(Comment::class);
        }

        public function Comments() {
            return $this->hasMany(Comment::class);
        }

        public function Upvotes() {
            return $this->morphMany(Upvote::class, 'Upvotable');
        }

        public function Upvoted() {
            return $this->morphOne(Upvote::class, 'Upvotable');
        }
    }
