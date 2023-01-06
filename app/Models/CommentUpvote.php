<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CommentUpvote extends Model {
        use HasFactory;

        protected $fillable = [
            'comment_id',
            'user_id',
        ];

        public function Comment() {
            return $this->belongsTo(Comment::class);
        }

        public function Voter() {
            return $this->belongsTo(User::class);
        }
    }
