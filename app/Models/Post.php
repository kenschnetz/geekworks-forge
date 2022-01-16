<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Post extends Model {
        use SoftDeletes;
        protected $guarded = ['id'];
        protected $attributes = [
            'post_type_id' => null,
            'user_id' => null,
            'post_id' => null,
            'system_id' => null,
            'category_id' => null,
            'slug' => null,
            'published' => false,
            'moderated' => false,
            'allow_conversions' => true,
            'is_art_only' => false,
            'locked_art' => true,
            'locked_canon' => true,
            'is_conversion' => false,
        ];

        public function Type() {
            return $this->belongsTo(PostType::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function ParentPost() {
            return $this->belongsTo(Post::class);
        }

        public function ChildPosts() {
            return $this->hasMany(Post::class);
        }

        public function System() {
            return $this->belongsTo(System::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }

        public function Canons() {
            return $this->belongsToMany(Canon::class, 'canon_posts');
        }

        public function CanonPosts() {
            return $this->hasMany(CanonPost::class)->with('Canon');
        }

        public function PostDetails() {
            return $this->hasMany(PostDetail::class);
        }

        public function Collaborators() {
            return $this->belongsToMany(User::class, 'post_collaborators');
        }

        public function ActivePostDetails() {
            return $this->hasOne(PostDetail::class)->where('active', true);
        }

        public function Upvotes() {
            return $this->morphMany(Upvote::class, 'Upvotable');
        }

        public function Comments() {
            return $this->hasMany(Comment::class);
        }

        public function Views() {
            return $this->hasMany(PostView::class);
        }
    }
