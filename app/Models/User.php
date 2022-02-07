<?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable implements MustVerifyEmail {
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
            'terms_accepted',
            'terms_accepted_at',
            'last_password_reset_sent_at',
            'role_id',
            'unread_global_messages',
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
            'last_password_reset_sent_at' => 'datetime',
            'email_verified_at' => 'datetime',
        ];

	    public function IsStaff() {
            return $this->Role->name === 'Staff';
        }

        public function IsAdmin() {
            return $this->Role->name === 'Staff' || $this->Role->name === 'Admin';
        }

        public function IsTester() {
            return $this->Role->name === 'Staff' || $this->Role->name === 'Admin' || $this->Role->name === 'Tester';
        }

        public function Role() {
            return $this->belongsTo(Role::class, 'role_id');
        }

        public function Notifications() {
            return $this->hasMany(UserNotification::class);
        }

        public function UserMutes() {
            return $this->hasMany(UserMute::class, 'user_id');
        }

        public function IssuedUserMutes() {
            return $this->hasMany(UserMute::class, 'admin_user_id');
        }

        public function UserBans() {
            return $this->hasMany(UserBan::class, 'user_id');
        }

        public function IssuedUserBans() {
            return $this->hasMany(UserBan::class, 'admin_user_id');
        }

        public function Follows() {
            return $this->hasMany(UserFollow::class);
        }

        public function FollowedBy() {
            return $this->hasMany(UserFollow::class, 'followed_user_id');
        }

        public function Searches() {
            return $this->hasMany(UserSearch::class);
        }

        public function Character() {
            return $this->hasOne(UserCharacter::class)->with('ProfilePhoto');
        }

        public function MessengerThreads() {
            return $this->belongsToMany(MessengerThread::class, 'messenger_thread_users');
        }

        public function MessengerNotifications() {
            return $this->MessengerThreads()->withSum(['Notifications' => fn ($query) => $query->where('user_id', $this->id),], 'count')->pluck('notifications_sum_count')->sum();
        }

        public function Systems() {
            return $this->hasMany(System::class);
        }

        public function Categories() {
            return $this->hasMany(Category::class);
        }

        public function Tags() {
            return $this->hasMany(Tag::class);
        }

        public function Attributes() {
            return $this->hasMany(Attribute::class);
        }

        public function Actions() {
            return $this->hasMany(Action::class);
        }

        public function Images() {
            return $this->hasMany(UserImage::class);
        }

        public function Posts() {
            return $this->hasMany(Post::class);
        }

        public function Ideas() {
            return $this->hasMany(Post::class)->where('post_type_id', 1);
        }

        public function Questions() {
            return $this->hasMany(Post::class)->where('post_type_id', 2);
        }

        public function Articles() {
            return $this->hasMany(Post::class)->where('post_type_id', 3);
        }

        public function PostUpvotes() {
            return $this->morphMany(Upvote::class, '')->where('flaggable_type', 'App\Models\Post');
        }

        public function PostFlags() {
            return $this->morphMany(Flag::class, 'flaggable')->where('flaggable_type', 'App\Models\Post');
        }

        public function PostRecommendations() {
            return $this->hasMany(PostCollaboration::class);
        }

        public function PostContributions() {
            return $this->hasMany(PostCollaborator::class);
        }

        public function PostViews() {
            return $this->hasMany(PostView::class);
        }

        public function Comments() {
            return $this->hasMany(Comment::class);
        }

        public function CommentUpvotes() {
            return $this->morphMany(Upvote::class, 'upvotable')->where('flaggable_type', 'App\Models\Comment');
        }

        public function CommentFlags() {
            return $this->morphMany(Flag::class, 'flaggable')->where('flaggable_type', 'App\Models\Comment');
        }

        public function Violations() {
            return $this->hasMany(UserViolation::class);
        }

        public function Tickets() {
            return $this->hasMany(Ticket::class);
        }

        public function Canons() {
            return $this->hasMany(Canon::class);
        }

        public function CanonPosts() {
            return $this->hasMany(CanonPost::class);
        }

        public function Collections() {
            return $this->hasMany(Collection::class);
        }

        public function UserActivities() {
            return $this->hasMany(UserActivity::class)->with('Logs');
        }

        public function AuthoredBounties() {
            return $this->hasMany(UserQuest::class);
        }

        public function BountiesInProgress() {
            return $this->hasMany(UserBounty::class);
        }

        public function AuthoredQuestLines() {
            return $this->hasMany(QuestLine::class);
        }

        public function AuthoredQuests() {
            return $this->hasMany(Quest::class);
        }

        public function QuestsInProgress() {
            return $this->hasMany(UserQuest::class);
        }
    }
