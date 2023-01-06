<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostFlag extends Model {
        use HasFactory;

        protected $fillable = [
            'post_id',
            'flagger_id',
            'reviewer_id',
            'reason',
            'reviewed_at',
            'outcome',
            'valid',
        ];

        protected $casts = [
            'reviewed_at' => 'datetime',
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function Flagger() {
            return $this->belongsTo(User::class, 'flagger_id');
        }

        public function Reviewer() {
            return $this->belongsTo(User::class, 'reviewer_id');
        }
    }
