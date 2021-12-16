<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Post extends Model {
        use SoftDeletes;

        protected $guarded = ['id'];
        protected $attributes = [
            'post_type_id' => 1, // 1 = idea, 1 = question, 2 = article
            'user_id' => null,
            'post_id' => null,
            'system_id' => null,
            'category_id' => null,
            'published' => false,
            'moderated' => false,
            'allow_conversions' => true,
            'is_conversion' => false,
            'is_art_only' => true,
            'locked_art' => true,
            'locked_canon' => true,
        ];

        public function PostType() {
            return $this->belongsTo(PostType::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function System() {
            return $this->belongsTo(System::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }

        public function ActivePostDetails() {
            return $this->hasMany(PostDetail::class)->where('active', true)->with('Images', 'Tags', 'Attributes', 'Actions');
        }

        public function PostDetails() {
            return $this->hasMany(PostDetail::class);
        }

        public function Contributors() {
            return $this->belongsToMany(User::class, 'post_contributors');
        }

        public function Comments() {
            return $this->hasMany(PostComment::class)
                ->whereNull('post_comment_id')
                ->with('Comments')
                ->withCount('Comments')
                ->withCount('Upvotes')
                ->orderBy('created_at', 'desc');
        }

        public function AllComments() {
            return $this->hasMany(PostComment::class);
        }

        public function Upvotes() {
            return $this->hasMany(PostUpvote::class);
        }

        public function UpvoteCount() {
            return $this->hasMany(PostUpvote::class)->count();
        }

        public function Flags() {
            return $this->hasMany(PostFlag::class);
        }

        public function Canons() {
            return $this->belongsToMany(Canon::class, 'canon_posts');
        }

        public function Collections() {
            return $this->belongsToMany(Collection::class, 'collection_posts');
        }

        public function Views() {
            return $this->hasMany(PostView::class);
        }

        public function ViewCount() {
            return $this->hasMany(PostView::class)->count();
        }
    }
