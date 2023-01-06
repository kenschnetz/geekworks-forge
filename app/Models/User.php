<?php

    namespace App\Models;

//    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable {
        use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',
            'email',
            'password',
            'role',
            'terms_accepted_at',
            'dark_mode',
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
            'terms_accepted_at' => 'datetime',
        ];

        public function Images() {
            return $this->hasMany(UserImage::class);
        }

        public function Posts() {
            return $this->hasMany(Post::class);
        }

        public function Collaborations() {
            return $this->hasMany(PostCollaborator::class);
        }

        public function PostsViewed() {
            return $this->hasManyThrough(Post::class, PostView::class);
        }

        public function PostsUpvoted() {
            return $this->hasManyThrough(Post::class, PostUpvote::class);
        }

        public function PostsFlagged() {
            return $this->hasManyThrough(Post::class, PostFlag::class);
        }

        public function Comments() {
            return $this->hasMany(Comment::class);
        }

        public function CommentsUpvoted() {
            return $this->hasManyThrough(Comment::class, CommentUpvote::class);
        }

        public function CommentsFlagged() {
            return $this->hasManyThrough(Comment::class, CommentFlag::class);
        }

        public function Collections() {
            return $this->hasMany(Comment::class);
        }

        public function CollectedPosts() {
            return $this->hasManyThrough(Post::class, CollectionPost::class);
        }

        public function CollectionsViewed() {
            return $this->hasManyThrough(Collection::class, CollectionView::class);
        }

        public function CollectionsUpvoted() {
            return $this->hasManyThrough(Collection::class, CollectionUpvote::class);
        }

        public function CollectionsFlagged() {
            return $this->hasManyThrough(Collection::class, CollectionFlag::class);
        }
    }
