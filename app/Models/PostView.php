<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostView extends Model {
        use HasFactory;

        protected $fillable = [
            'post_id',
            'user_id',
            'count',
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function Viewer() {
            return $this->belongsTo(User::class);
        }
    }
