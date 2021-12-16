<?php

    use App\Models\Achievement as AchievementModel;
    use App\Models\Action as ActionModel;
    use App\Models\Attribute as AttributeModel;
    use App\Models\Badge as BadgeModel;
    use App\Models\Post as PostModel;
    use App\Models\Category as CategoryModel;
    use App\Models\Faq as FaqModel;
    use App\Models\PostCommentFlag as PostCommentFlagModel;
    use App\Models\PostFlag as PostFlagModel;
    use App\Models\Quest as QuestModel;
    use App\Models\QuestLine as QuestLineModel;
    use App\Models\Role as RoleModel;
    use App\Models\SiteSettings as SiteSettingsModel;
    use App\Models\System as SystemModel;
    use App\Models\Tag as TagModel;
    use App\Models\User as UserModel;
    use App\Models\Violation as ViolationModel;
    use App\Models\Article as ArticleModel;
    use App\Models\Canon as CanonModel;
    use App\Models\Collection as CollectionModel;
    use App\Models\Idea as IdeaModel;
    use App\Models\Question as QuestionModel;
    use App\Models\Image as ImageModel;
    use App\Models\UserNotification as UserNotificationModel;
    use App\Models\PostRecommendation as PostRecommendationModel;

    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        if (Auth()->check()) {
            $user = Auth::user();
            $posts = PostModel::latest()->with('System', 'Category', 'ActivePostDetails', 'User', 'User.Character')->withCount('Upvotes', 'Comments', 'Views')->paginate(20);
            return Inertia::render('Feed', [
                'user' => $user,
                'posts' => $posts->toArray(),
                'active_tab' => 0,
            ]);
        } else {
            return Inertia::render('Home');
        }
    })->name('home');
    Route::middleware(['auth', 'verified'/*, 'terms', 'admin'*/])->prefix('admin')->group(function () {
        Route::get('/achievement/{achievement_id?}', function ($achievement_id = null) {
            $achievement = AchievementModel::where('id', $achievement_id)->first();
            if (!empty($achievement_id) && empty($achievement)) {
                return abort(404);
            } else {
                return Inertia::render('AdminAchievement', [
                    'achievement' => $achievement
                ]);
            }
        })->name('admin-achievement');
        Route::get('/achievements', function () {
            $achievements = AchievementModel::all();
            return Inertia::render('AdminAchievements', [
                'achievements' => $achievements
            ]);
        })->name('admin-achievements');
        Route::get('/action/{action_id?}', function ($action_id = null) {
            $action = AchievementModel::where('id', $action_id)->first();
            if (!empty($action_id) && empty($action)) {
                return abort(404);
            } else {
                return Inertia::render('AdminAction', [
                    'action' => $action
                ]);
            }
        })->name('admin-action');
        Route::get('/actions', function () {
            $actions = ActionModel::all();
            return Inertia::render('AdminActions', [
                'actions' => $actions
            ]);
        })->name('admin-actions');
        Route::get('/attribute/{attribute_id?}', function ($attribute_id = null) {
            $attribute = AttributeModel::where('id', $attribute_id)->first();
            if (!empty($attribute_id) && empty($attribute)) {
                return abort(404);
            } else {
                return Inertia::render('AdminAttribute', [
                    'attribute' => $attribute
                ]);
            }
        })->name('admin-attribute');
        Route::get('/attributes', function () {
            $attributes = AttributeModel::all();
            return Inertia::render('AdminAttributes', [
                'attributes' => $attributes
            ]);
        })->name('admin-attributes');
        Route::get('/badge/{badge_id?}', function ($badge_id = null) {
            $badge = BadgeModel::where('id', $badge_id)->first();
            if (!empty($badge_id) && empty($badge)) {
                return abort(404);
            } else {
                return Inertia::render('AdminBadge', [
                    'badge' => $badge
                ]);
            }
        })->name('admin-badge');
        Route::get('/badges', function () {
            $badges = BadgeModel::all();
            return Inertia::render('AdminBadges', [
                'badges' => $badges
            ]);
        })->name('admin-badges');
        Route::get('/category/{category_id?}', function ($category_id = null) {
            $category = CategoryModel::where('id', $category_id)->first();
            if (!empty($category_id) && empty($badge)) {
                return abort(404);
            } else {
                return Inertia::render('AdminCategory', [
                    'category' => $category
                ]);
            }
        })->name('admin-category');
        Route::get('/categories', function () {
            $categories = CategoryModel::all();
            return Inertia::render('AdminCategories', [
                'categories' => $categories
            ]);
        })->name('admin-categories');
        Route::get('/faq/{faq_id?}', function ($faq_id = null) {
            $faq = FaqModel::where('id', $faq_id)->first();
            if (!empty($faq_id) && empty($faq)) {
                return abort(404);
            } else {
                return Inertia::render('AdminFaq', [
                    'faq' => $faq
                ]);
            }
        })->name('admin-faq');
        Route::get('/faqs', function () {
            $faqs = FaqModel::all();
            return Inertia::render('AdminFaqs', [
                'faqs' => $faqs
            ]);
        })->name('admin-faqs');
        Route::get('/post-comment-flag/{post_comment_flag_id}', function ($post_comment_flag_id) {
            $post_comment_flag = PostCommentFlagModel::where('id', $post_comment_flag_id)->first();
            if (!empty($post_comment_flag_id) && empty($post_comment_flag)) {
                return abort(404);
            } else {
                return Inertia::render('AdminPostCommentFlag', [
                    'post_comment_flag' => $post_comment_flag
                ]);
            }
        })->name('admin-post-comment-flag');
        Route::get('/post-comment-flags', function () {
            $post_comment_flags = PostCommentFlagModel::all();
            return Inertia::render('AdminPostCommentFlags', [
                'post_comment_flags' => $post_comment_flags
            ]);
        })->name('admin-post-comment-flags');
        Route::get('/post-flag/{post_flag_id}', function ($post_flag_id) {
            $post_flag = PostFlagModel::where('id', $post_flag_id)->first();
            if (!empty($post_flag_id) && empty($post_flag)) {
                return abort(404);
            } else {
                return Inertia::render('AdminPostFlag', [
                    'post_flag' => $post_flag
                ]);
            }
        })->name('admin-post-flag');
        Route::get('/post-flags', function () {
            $post_flags = PostFlagModel::all();
            return Inertia::render('AdminPostFlags', [
                'post_flags' => $post_flags
            ]);
        })->name('admin-post-flags');
        Route::get('/quest/{quest_id?}', function ($quest_id = null) {
            $quest = QuestModel::where('id', $quest_id)->first();
            if (!empty($quest_id) && empty($post_flag)) {
                return abort(404);
            } else {
                return Inertia::render('AdminQuest', [
                    'quest' => $quest
                ]);
            }
        })->name('admin-quest');
        Route::get('/quests', function () {
            $quests = QuestModel::all();
            return Inertia::render('AdminQuests', [
                'quests' => $quests
            ]);
        })->name('admin-quests');
        Route::get('/quest-line/{quest_line_id?}', function ($quest_line_id = null) {
            $quest_line = QuestLineModel::where('id', $quest_line_id)->first();
            if (!empty($quest_line_id) && empty($quest_line)) {
                return abort(404);
            } else {
                return Inertia::render('AdminQuestLine', [
                    'quest_line' => $quest_line
                ]);
            }
        })->name('admin-quest-line');
        Route::get('/quest-lines', function () {
            $quest_lines = QuestLineModel::all();
            return Inertia::render('AdminQuestLines', [
                'quest_lines' => $quest_lines
            ]);
        })->name('admin-quest-lines');
        Route::get('/role/{role_id?}', function ($role_id = null) {
            $role = RoleModel::where('id', $role_id)->first();
            if (!empty($role_id) && empty($role)) {
                return abort(404);
            } else {
                return Inertia::render('AdminRole', [
                    'role' => $role
                ]);
            }
        })->name('admin-role');
        Route::get('/roles', function () {
            $roles = RoleModel::all();
            return Inertia::render('AdminRoles', [
                'roles' => $roles
            ]);
        })->name('admin-roles');
        Route::get('/site-settings', function () {
            $site_settings = SiteSettingsModel::all();
            return Inertia::render('AdminSiteSettings', [
                'site_settings' => $site_settings
            ]);
        })->name('admin-site-settings');
        Route::get('/system/{system_id?}', function ($system_id = null) {
            $system = SystemModel::where('id', $system_id)->first();
            if (!empty($system_id) && empty($system)) {
                return abort(404);
            } else {
                return Inertia::render('AdminSystem', [
                    'system' => $system
                ]);
            }
        })->name('admin-system');
        Route::get('/systems', function () {
            $systems = SystemModel::all();
            return Inertia::render('AdminSystems', [
                'systems' => $systems
            ]);
        })->name('admin-systems');
        Route::get('/tag/{tag_id?}', function ($tag_id = null) {
            $tag = TagModel::where('id', $tag_id)->first();
            if (!empty($tag_id) && empty($system)) {
                return abort(404);
            } else {
                return Inertia::render('AdminTag', [
                    'tag' => $tag
                ]);
            }
        })->name('admin-tag');
        Route::get('/tags', function () {
            $tags = TagModel::all();
            return Inertia::render('AdminTags', [
                'tags' => $tags
            ]);
        })->name('admin-tags');
        Route::get('/user/{user_id?}', function ($user_id = null) {
            $user = UserModel::where('id', $user_id)->first();
            if (!empty($user_id) && empty($system)) {
                return abort(404);
            } else {
                return Inertia::render('AdminUser', [
                    'user' => $user
                ]);
            }
        })->name('admin-user');
        Route::get('/users', function () {
            $users = UserModel::all();
            return Inertia::render('AdminUsers', [
                'users' => $users
            ]);
        })->name('admin-users');
        Route::get('/violation/{violation_id?}', function ($violation_id = null) {
            $violation = ViolationModel::where('id', $violation_id)->first();
            if (!empty($violation_id) && empty($system)) {
                return abort(404);
            } else {
                return Inertia::render('AdminViolation', [
                    'violation' => $violation
                ]);
            }
        })->name('admin-violation');
        Route::get('/violations', function () {
            $violations = ViolationModel::all();
            return Inertia::render('AdminViolations', [
                'violations' => $violations
            ]);
        })->name('admin-violations');
    });
    Route::middleware(['auth', 'verified'/*, 'terms', 'admin'*/])->get('/article/{post_id?}', function ($post_id = null) {
        $post = PostModel::where('id', $post_id)->first();
        if (!empty($post_id) && empty($system)) {
            return abort(404);
        } else {
            return Inertia::render('Article', [
                'post' => $post
            ]);
        }
    })->name('article');
    Route::get('/articles', function () {
        $user = Auth::user();
        $posts = PostModel::where('post_type_id', 3)->latest()->with('System', 'Category', 'ActivePostDetails', 'User', 'User.Character')->withCount('Upvotes', 'Comments', 'Views')->paginate(20);
        return Inertia::render('Feed', [
            'user' => $user,
            'posts' => $posts->toArray(),
            'active_tab' => 4,
        ]);
    })->name('articles');
    Route::prefix('canon')->group(function () {
        Route::get('/{canon_id}', function ($canon_id) {
            $canon = CanonModel::where('id', $canon_id)->first();
            if (!empty($canon_id) && empty($canon)) {
                return abort(404);
            } else {
                return Inertia::render('Canon', [
                    'canon' => $canon
                ]);
            }
        })->name('canon');
        Route::get('/{canon_id}/posts', function ($canon_id) {
            $canon_posts = CanonModel::where('id', $canon_id)->first()->Posts();
            return Inertia::render('CanonPosts', [
                'canon_posts' => $canon_posts
            ]);
        })->name('canon-posts');
    });
    Route::get('/canons', function () {
        $canons = CanonModel::all();
        return Inertia::render('Canons', [
            'canons' => $canons
        ]);
    })->name('canons');
    Route::get('/category/{category_id}/posts', function ($category_id) {
        $user = Auth::user();
        $posts = CategoryModel::where('id', $category_id)->first()->Posts()->latest()->with('System', 'Category', 'ActivePostDetails', 'User', 'User.Character')->withCount('Upvotes', 'Comments', 'Views')->paginate(20);
        return Inertia::render('Feed', [
            'user' => $user,
            'posts' => $posts->toArray(),
            'active_tab' => 0
        ]);
    })->name('category-posts');
    Route::prefix('collection')->group(function () {
        Route::get('/{collection_id}', function ($collection_id) {
            $collection = CollectionModel::where('id', $collection_id)->first();
            if (!empty($collection_id) && empty($collection)) {
                return abort(404);
            } else {
                return Inertia::render('Collection', [
                    'collection' => $collection
                ]);
            }
        })->name('collection');
        Route::get('/{collection_id}/posts', function ($collection_id) {
            $collection_posts = CollectionModel::where('id', $collection_id)->first()->Posts();
            return Inertia::render('CollectionPosts', [
                'collection_posts' => $collection_posts
            ]);
        })->name('collection-posts');
    });
    Route::get('/collections', function () {
        $collections = CollectionModel::all();
        return Inertia::render('Collections', [
            'collections' => $collections
        ]);
    })->name('collections');
    Route::get('/faq', function () {
        $faqs = FaqModel::all();
        return Inertia::render('Faq', [
            'faqs' => $faqs
        ]);
    })->name('faq');
    Route::prefix('flag')->group(function () {
        Route::get('/post/{post_id}', function ($post_id) {
            $post = PostModel::where('id', $post_id)->first();
            return Inertia::render('FlagPost', [
                'post' => $post
            ]);
        })->name('flag-post');
        Route::get('/post-comment/{post_comment_id}', function ($post_comment_id) {
            $post_comment = PostCommentModel::where('id', $post_comment_id)->first();
            return Inertia::render('FlagPostComment', [
                'post_comment' => $post_comment
            ]);
        })->name('flag-post-comment');
    });
    Route::middleware(['auth', 'verified'])->prefix('idea')->group(function () {
        Route::get('/{post_id?}', function ($post_id = null) {
            $post = PostModel::where('id', $post_id)->first();
            if (!empty($post_id) && empty($post)) {
                return abort(404);
            } else {
                $post->post_details = $post->PostDetails()->with('Images', 'Tags', 'Attributes', 'Actions')->where('active', true)->first();
                return Inertia::render('Idea', [
                    'post' => $post
                ]);
            }
        })->name('idea');
        Route::get('/idea/{post_id}/recommendation', function ($post_id) {
            $post = PostModel::where('id', $post_id)->first();
            return Inertia::render('IdeaRecommendation', [
                'post' => $post
            ]);
        })->name('idea-recommendation');
    });
    Route::get('/ideas', function () {
        $user = Auth::user();
        $posts = PostModel::where('post_type_id', 1)->latest()->with('System', 'Category', 'ActivePostDetails', 'User', 'User.Character')->withCount('Upvotes', 'Comments', 'Views')->paginate(20);
        return Inertia::render('Feed', [
            'user' => $user,
            'posts' => $posts->toArray(),
            'active_tab' => 2,
        ]);
    })->name('ideas');
    Route::get('/question/{post_id?}', function ($post_id = null) {
        $post = PostModel::where('id', $post_id)->first();
        return Inertia::render('Question', [
            'post' => $post
        ]);
    })->name('question');
    Route::get('/questions', function () {
        $user = Auth::user();
        $posts = PostModel::where('post_type_id', 2)->latest()->with('System', 'Category', 'ActivePostDetails', 'User', 'User.Character')->withCount('Upvotes', 'Comments', 'Views')->paginate(20);
        return Inertia::render('Feed', [
            'user' => $user,
            'posts' => $posts->toArray(),
            'active_tab' => 3,
        ]);
    })->name('questions');
    Route::get('/tag/{tag_id}/posts', function ($tag_id) {
        $tag_posts = TagModel::where('id', $tag_id)->first()->Posts();
        return Inertia::render('TagPosts', [
            'tag_posts' => $tag_posts
        ]);
    })->name('tag-posts');
    Route::get('/terms', function () {
        return Inertia::render('Terms');
    })->name('terms');
    Route::middleware(['auth', 'verified'/*, 'terms'*/])->prefix('user')->group(function () {
        Route::get('/{user_id}/canon/{canon_id?}', function ($user_id, $canon_id = null) {
            $canon = CanonModel::where('user_id', $user_id)->where('id', $canon_id)->first();
            if (!empty($user_id) && !empty($canon_id) && empty($canon)) {
                return abort(404);
            } else {
                return Inertia::render('UserCanon', [
                    'canon' => $canon
                ]);
            }
        })->name('user-canon');
        Route::get('/{user_id}/canons', function ($user_id) {
            $canons = CanonModel::where('user_id', $user_id)->get();
            return Inertia::render('UserCanons', [
                'canons' => $canons
            ]);
        })->name('user-canons');
        Route::get('/{user_id}/collection/{collection_id?}', function ($user_id, $collection_id = null) {
            $collection = CollectionModel::where('user_id', $user_id)->where('id', $collection_id)->first();
            if (!empty($user_id) && !empty($collection_id) && empty($collection)) {
                return abort(404);
            } else {
                return Inertia::render('UserCollection', [
                    'collection' => $collection
                ]);
            }
        })->name('user-collection');
        Route::get('/{user_id}/collections', function ($user_id) {
            $collections = CollectionModel::where('user_id', $user_id)->get();
            return Inertia::render('UserCollections', [
                'collections' => $collections
            ]);
        })->name('user-collections');
        Route::get('/{user_id}/image/{image_id?}', function ($user_id, $image_id = null) {
            $image = ImageModel::where('user_id', $user_id)->where('id', $image_id)->first();
            if (!empty($user_id) && !empty($image_id) && empty($image)) {
                return abort(404);
            } else {
                return Inertia::render('UserImage', [
                    'image' => $image
                ]);
            }
        })->name('user-image');
        Route::get('/{user_id}/images', function ($user_id) {
            $images = ImageModel::where('user_id', $user_id)->get();
            return Inertia::render('UserImages', [
                'images' => $images
            ]);
        })->name('user-images');
        Route::get('/{user_id}/notifications', function ($user_id) {
            $notifications = UserNotificationModel::where('user_id', $user_id)->get();
            return Inertia::render('UserNotifications', [
                'notifications' => $notifications
            ]);
        })->name('user-notifications');
        Route::get('/{user_id}/posts', function ($user_id) {
            $posts = PostModel::where('user_id', $user_id)->get();
            return Inertia::render('UserPosts', [
                'posts' => $posts
            ]);
        })->name('user-posts');
        Route::get('/{user_id}/profile', function ($user_id) {
            $profile = UserModel::where('id', $user_id)->get();
            return Inertia::render('UserProfile', [
                'profile' => $profile
            ]);
        })->name('user-profile');
        Route::get('/{user_id}/recommendation/{recommendation_id?}', function ($user_id, $recommendation_id = null) {
            $recommendation = PostRecommendationModel::where('user_id', $user_id)->where('id', $recommendation_id)->first();
            if (!empty($user_id) && !empty($recommendation_id) && empty($recommendation)) {
                return abort(404);
            } else {
                return Inertia::render('UserRecommendation', [
                    'recommendation' => $recommendation
                ]);
            }
        })->name('user-recommendation');
        Route::get('/{user_id}/recommendations', function ($user_id) {
            $recommendations = PostRecommendationModel::where('user_id', $user_id)->get();
            return Inertia::render('UserRecommendations', [
                'recommendations' => $recommendations
            ]);
        })->name('user-recommendations');
    });
    Route::get('/posts/{post_slug}', function ($post_slug) {
        $post = PostModel::whereHas('PostDetails', function($post_detail) use($post_slug) {
            return $post_detail->where('slug', $post_slug);
        })->first();
        if (!empty($post_id) && empty($post)) {
            return abort(404);
        } else {
            $post->post_details = $post->PostDetails()->with('Images', 'Tags', 'Attributes', 'Actions')->where('active', true)->first();
            return Inertia::render('ViewPost', [
                'post' => $post
            ]);
        }
    })->name('post');

    require __DIR__ . '/auth.php';
