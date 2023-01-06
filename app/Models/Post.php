<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Post extends Model {
        use HasFactory;

        protected $fillable = [
            'user_id',
            'post_id',
            'system_id',
            'category_id',
            'post_type',
            'slug',
            'total_views',
            'published',
            'moderated',
            'allow_collaborating',
        ];

        public function Author() {
            return $this->belongsTo(User::class);
        }

        public function OriginalPost() {
            return $this->belongsTo(Post::class);
        }

        public function System() {
            return $this->belongsTo(System::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }

        public function PostDetails() {
            return $this->hasMany(PostDetail::class);
        }

        public function ActivePostDetails() {
            return $this->hasMany(PostDetail::class)->where('active', true)->first();
        }

        public function Images() {
            return $this->hasManyThrough(UserImage::class, PostUserImage::class);
        }

        public function Collaborations() {
            return $this->hasMany(PostCollaboration::class);
        }

        public function Collaborators() {
            return $this->hasMany(PostCollaborator::class);
        }

        public function Views() {
            return $this->hasMany(PostView::class);
        }

        public function Upvotes() {
            return $this->hasMany(Comment::class);
        }

        public function Flags() {
            return $this->hasMany(Comment::class);
        }

        public function Comments() {
            return $this->hasMany(Comment::class);
        }

        public function Collections() {
            return $this->belongsToMany(Collection::class, 'collection_posts');
        }
    }
