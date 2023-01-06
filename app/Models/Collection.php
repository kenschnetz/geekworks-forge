<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Collection extends Model {
        use HasFactory;

        protected $fillable = [
            'user_id',
            'slug',
            'name',
            'description',
            'total_views',
            'publicly_visible',
            'allow_collaboration',
            'require_approval',
        ];

        public function Author() {
            return $this->belongsTo(User::class);
        }

        public function Posts() {
            return $this->hasManyThrough(Post::class, CollectionPost::class);
        }

        public function Views() {
            return $this->hasMany(CollectionView::class);
        }

        public function Upvotes() {
            return $this->hasMany(CollectionUpvote::class);
        }

        public function Flags() {
            return $this->hasMany(CollectionFlag::class);
        }
    }
