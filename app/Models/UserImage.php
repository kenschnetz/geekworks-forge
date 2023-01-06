<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class UserImage extends Model {
        use HasFactory;

        protected $fillable = [
            'user_id',
            'name',
            'path',
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Posts() {
            return $this->hasManyThrough(Post::class, PostUserImage::class);
        }
    }
