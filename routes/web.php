<?php

    use App\Http\Livewire\AcceptTerms;
    use App\Http\Livewire\Terms;
    use App\Mail\MyTestMail;
    use Illuminate\Support\Facades\Route;

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

    require __DIR__ . '/auth.php';

    Route::get('/', function () {
        if (Auth::check()) {
            return view('components.layout', [
                'view' => 'feed',
                'properties' => [],
            ]);
        } else {
            return view('home');
        }
    })->name('home')->middleware('verified-if-authed', 'terms');

    Route::get('/logout', function () {
        Auth()->logout();
        return redirect('/');
    });

    Route::get('/accept-terms', AcceptTerms::class)->name('accept-terms');

    Route::get('/terms', Terms::class)->name('terms');

    Route::get('/admin', function () {
        return view('components.layout', [
            'view' => 'admin',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools']
            ]
        ]);
    })->name('admin-tools')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/users', function () {
        return view('components.layout', [
            'view' => 'users',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Users', 'route' => 'admin-users'],
            ]
        ]);
    })->name('admin-users')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/user/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'user',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Users', 'route' => 'admin-users'],
                ['name' => 'User'],
            ]
        ]);
    })->name('admin-user')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/user-violations', function () {
        return view('components.layout', [
            'view' => 'user-violations',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'User Violations'],
            ]
        ]);
    })->name('admin-user-violations')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/user-violation/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'user-violation',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'User Violations', 'route' => 'admin-user-violations'],
                ['name' => 'User Violation'],
            ]
        ]);
    })->name('admin-user-violation')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/user-mutes', function () {
        return view('components.layout', [
            'view' => 'user-mutes',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'User Mutes'],
            ]
        ]);
    })->name('admin-user-mutes')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/user-mute/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'user-mute',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'User Mutes', 'route' => 'admin-user-mutes'],
                ['name' => 'User Mute'],
            ]
        ]);
    })->name('admin-user-mute')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/flags', function () {
        return view('components.layout', [
            'view' => 'flags',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'User Flags'],
            ]
        ]);
    })->name('admin-flags')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/flag/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'flag',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'User Flags', 'route' => 'admin-flags'],
                ['name' => 'User Flag'],
            ]
        ]);
    })->name('admin-flag')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/post-types', function () {
        return view('components.layout', [
            'view' => 'post-types',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Post Types'],
            ]
        ]);
    })->name('admin-post-types')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/post-type/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'post-type',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Post Types', 'route' => 'admin-post-types'],
                ['name' => 'Post Type'],
            ]
        ]);
    })->name('admin-post-type')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/systems', function () {
        return view('components.layout', [
            'view' => 'systems',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Systems'],
            ]
        ]);
    })->name('admin-systems')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/system/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'system',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Systems', 'route' => 'admin-systems'],
                ['name' => 'System'],
            ]
        ]);
    })->name('admin-system')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/categories', function () {
        return view('components.layout', [
            'view' => 'categories',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Categories'],
            ]
        ]);
    })->name('admin-categories')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/category/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'category',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Categories', 'route' => 'admin-categories'],
                ['name' => 'Category'],
            ]
        ]);
    })->name('admin-category')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/tags', function () {
        return view('components.layout', [
            'view' => 'tags',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Tags'],
            ]
        ]);
    })->name('admin-tags')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/tag/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'tag',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Tags', 'route' => 'admin-tags'],
                ['name' => 'Tag'],
            ]
        ]);
    })->name('admin-tag')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/attributes', function () {
        return view('components.layout', [
            'view' => 'attributes',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Attributes'],
            ]
        ]);
    })->name('admin-attributes')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/attribute/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'admin-attribute',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Attributes', 'route' => 'admin-attributes'],
                ['name' => 'Attribute'],
            ]
        ]);
    })->name('admin-attribute')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/actions', function () {
        return view('components.layout', [
            'view' => 'actions',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Actions'],
            ]
        ]);
    })->name('admin-actions')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/action/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'action',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Actions', 'route' => 'admin-actions'],
                ['name' => 'Action'],
            ]
        ]);
    })->name('admin-action')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/bounties', function () {
        return view('components.layout', [
            'view' => 'bounties',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Bounties'],
            ]
        ]);
    })->name('admin-bounties')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/bounty/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'bounty',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Bounties', 'route' => 'admin-bounties'],
                ['name' => 'Bounty'],
            ]
        ]);
    })->name('admin-bounty')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/quest-lines', function () {
        return view('components.layout', [
            'view' => 'quest-lines',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Quest Lines'],
            ]
        ]);
    })->name('admin-quest-lines')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/quest-line/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'quest-line',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Quest Lines', 'route' => 'admin-quest-lines'],
                ['name' => 'Quest Line'],
            ]
        ]);
    })->name('admin-quest-line')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/quests', function () {
        return view('components.layout', [
            'view' => 'quests',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Quests'],
            ]
        ]);
    })->name('admin-quests')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/quest/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'quest',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Quests', 'route' => 'admin-quests'],
                ['name' => 'Quest'],
            ]
        ]);
    })->name('admin-quest')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/achievements', function () {
        return view('components.layout', [
            'view' => 'achievements',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Achievements'],
            ]
        ]);
    })->name('admin-achievements')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/achievement/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'achievement',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Achievements', 'route' => 'admin-achievements'],
                ['name' => 'Achievement'],
            ]
        ]);
    })->name('admin-achievement')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/badges', function () {
        return view('components.layout', [
            'view' => 'badges',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Badges'],
            ]
        ]);
    })->name('admin-badges')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/badge/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'badge',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Admin Tools', 'route' => 'admin-tools'],
                ['name' => 'Badges', 'route' => 'admin-badges'],
                ['name' => 'Badge'],
            ]
        ]);
    })->name('admin-badge')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/images', function () {
        return view('components.layout', [
            'view' => 'images',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => auth()->user()->Character->name, 'route' => 'user-profile'],
                ['name' => 'Images'],
            ]
        ]);
    })->name('images')->middleware('terms', 'auth', 'verified');

    Route::get('/image/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'image',
            'properties' => ['item_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => auth()->user()->Character->name, 'route' => 'user-profile'],
                ['name' => 'Images', 'route' => 'images'],
                ['name' => 'Image'],
            ]
        ]);
    })->name('image')->middleware('terms', 'auth', 'verified');

    Route::get('/profile/{user_name?}', function ($user_name = null) {
        if (empty($user_name)) {
            $user_name = auth()->user()->Character->name;
        }
        return view('components.layout', [
            'view' => 'user-profile',
            'properties' => ['user_name' => $user_name],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $user_name],
            ]
        ]);
    })->name('user-profile')->middleware('terms', 'auth', 'verified');

    Route::get('/account/{notification?}', function ($notification = null) {
        return view('components.layout', [
            'view' => 'account',
            'properties' => ['notification' => $notification],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Account'],
            ]
        ]);
    })->name('account')->middleware('terms', 'auth', 'verified');

    Route::get('/user/{user_name}/posts', function ($user_name) {
        return view('components.layout', [
            'view' => 'user-posts',
            'properties' => ['user_name' => $user_name]
        ]);
    })->name('user-posts')->middleware('terms', 'auth', 'verified');

    Route::get('/user-notifications', function () {
        return view('components.layout', [
            'view' => 'user-notifications',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => auth()->user()->Character->name, 'route' => 'user-profile'],
                ['name' => 'Notifications'],
            ]
        ]);
    })->name('user-notifications')->middleware('terms', 'auth', 'verified');

    Route::get('/messenger/{action?}/{actionable_id?}', function ($action = null, $actionable_id = null) {
        return view('components.layout', [
            'view' => 'messenger',
            'properties' => ['action' => $action, 'actionable_id' => $actionable_id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Messenger'],
            ]
        ]);
    })->name('messenger')->middleware('terms', 'auth', 'verified');

    Route::get('/flag/{flaggable_id}/{flaggable_type}', function ($flaggable_id, $flaggable_type) {
        $flaggable = match($flaggable_type) {
            'Post' => \App\Models\Post::where('id', $flaggable_id)->first(),
            'Comment' => \App\Models\Comment::where('id', $flaggable_id)->first()
        };
        if (empty($flaggable)) {
            abort(404);
        }
        return view('components.layout', [
            'view' => 'flag-content',
            'properties' => [
                'flaggable_id' => $flaggable_id,
                'flaggable_type' => 'App\Models\\' . $flaggable_type
            ],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $flaggable_type === 'Comment' ? $flaggable->Post->ActivePostDetails->title : $flaggable->ActivePostDetails->title, 'route' => 'post', 'route_params' => ['slug' => ($flaggable_type === 'Comment' ? $flaggable->Post->slug : $flaggable->slug)]],
                ['name' => 'Flag ' . $flaggable_type],
            ]
        ]);
    })->name('flag-content')->middleware('terms', 'auth', 'verified');

    Route::get('/tickets', function () {
        return view('components.layout', [
            'view' => 'tickets',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Support Tickets'],
            ]
        ]);
    })->name('tickets')->middleware('terms', 'auth', 'verified');

    Route::get('/ticket/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'ticket',
            'properties' => ['id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Support Tickets', 'route' => 'tickets'],
                ['name' => 'Request'],
            ]
        ]);
    })->name('ticket')->middleware('terms', 'auth', 'verified');

    Route::get('/search', function () {
        return view('components.layout', [
            'view' => 'post-search',
            'properties' => []
        ]);
    })->name('post-search')->middleware('terms', 'auth', 'verified');

    Route::get('/search-results', function () {
        return view('components.layout', [
            'view' => 'post-search-results',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Search', 'route' => 'post-search'],
                ['name' => 'Search Results'],
            ]
        ]);
    })->name('post-search-results')->middleware('terms', 'auth', 'verified');

    Route::get('/new-post', function () {
        return view('components.layout', [
            'view' => 'new-post',
            'properties' => []
        ]);
    })->name('new-post')->middleware('terms', 'auth', 'verified');

    Route::get('/ideas/{user_name?}', function ($user_name = null) {
        $user_id = \App\Models\UserCharacter::where('name', $user_name)->first()->User->id;
        return view('components.layout', [
            'view' => 'ideas',
            'properties' => ['user_id' => $user_id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $user_name, 'route' => 'user-profile', 'route_params' => ['user_name' => $user_name]],
                ['name' => 'Ideas'],
            ]
        ]);
    })->name('ideas')->middleware('terms', 'auth', 'verified');

    Route::get('/idea/{post_id}', function ($post_id) {
        return view('components.layout', [
            'view' => 'idea',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('idea')->middleware('terms', 'auth', 'verified');

    Route::get('/questions/{user_name?}', function ($user_name = null) {
        $user_id = \App\Models\UserCharacter::where('name', $user_name)->first()->User->id;
        return view('components.layout', [
            'view' => 'questions',
            'properties' => ['user_id' => $user_id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $user_name, 'route' => 'user-profile', 'route_params' => ['user_name' => $user_name]],
                ['name' => 'Questions'],
            ]
        ]);
    })->name('questions')->middleware('terms', 'auth', 'verified');

    Route::get('/question/{post_id?}', function ($post_id = null) {
        return view('components.layout', [
            'view' => 'question',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('question')->middleware('terms', 'auth', 'verified');

    Route::get('/articles/{user_name?}', function ($user_name = null) {
        $user_id = \App\Models\UserCharacter::where('name', $user_name)->first()->User->id;
        return view('components.layout', [
            'view' => 'articles',
            'properties' => ['user_id' => $user_id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $user_name, 'route' => 'user-profile', 'route_params' => ['user_name' => $user_name]],
                ['name' => 'Articles'],
            ]
        ]);
    })->name('articles')->middleware('terms', 'auth', 'verified');

    Route::get('/article/{post_id?}', function ($post_id = null) {
        return view('components.layout', [
            'view' => 'article',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('article')->middleware('terms', 'auth', 'verified');

    Route::get('/collaborate/{post_id}', function ($post_id) {
        $post = App\Models\Post::find($post_id);
        return view('components.layout', [
            'view' => 'collaborate',
            'properties' => ['post_id' => $post_id, 'is_collaboration' => true],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $post->ActivePostDetails->title, 'route' => 'post', 'route_params' => ['slug' => $post->slug]],
                ['name' => 'Collaboration'],
            ]
        ]);
    })->name('collaborate')->middleware('terms', 'auth', 'verified');

    Route::get('/canons/{user_name?}', function ($user_name = null) {
        if (empty($user_name)) {
            $user = auth()->user();
        } else {
            $user = \App\Models\UserCharacter::where('name', $user_name)->first()->User;
        }
        return view('components.layout', [
            'view' => 'canons',
            'properties' => ['user_name' => $user->Character->name],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $user->Character->name, 'route' => 'user-profile', 'route_params' => ['user_name' => $user->Character->name]],
                ['name' => 'Canons'],
            ]
        ]);
    })->name('canons')->middleware('terms', 'auth', 'verified');

    Route::get('/canon/{slug?}', function ($slug = null) {
        if (!empty($slug)) {
            $canon = \App\Models\Canon::where('slug', $slug)->first();
            $user = $canon->User;
        } else {
            $canon = null;
            $user = auth()->user();
        }
        return view('components.layout', [
            'view' => 'canon',
            'properties' => ['slug' => $slug],
            'show_breadcrumbs' => !empty($slug),
            'breadcrumbs' => [
                ['name' => $user->Character->name, 'route' => 'user-profile', 'route_params' => ['user_name' => $user->Character->name]],
                ['name' => 'Canons', 'route' => 'canons', 'route_params' => ['user_name' => $user->Character->name]],
                ['name' => empty($canon) ? 'New Canon' : $canon->name],
            ]
        ]);
    })->name('canon')->middleware('terms', 'auth', 'verified');

    Route::get('/collections/{user_name?}', function ($user_name = null) {
        if (empty($user_name)) {
            $user = auth()->user();
        } else {
            $user = \App\Models\UserCharacter::where('name', $user_name)->first()->User;
        }
        return view('components.layout', [
            'view' => 'collections',
            'properties' => ['user_name' => $user->Character->name],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => $user->Character->name, 'route' => 'user-profile', 'route_params' => ['user_name' => $user->Character->name]],
                ['name' => 'Collections'],
            ]
        ]);
    })->name('collections')->middleware('terms', 'auth', 'verified');

    Route::get('/collection/{slug?}', function ($slug = null) {
        if (!empty($slug)) {
            $collection = \App\Models\Collection::where('slug', $slug)->first();
            $user = $collection->User;
        } else {
            $collection = null;
            $user = auth()->user();
        }
        return view('components.layout', [
            'view' => 'collection',
            'properties' => ['slug' => $slug],
            'show_breadcrumbs' => !empty($slug),
            'breadcrumbs' => [
                ['name' => $user->Character->name, 'route' => 'user-profile', 'route_params' => ['user_name' => $user->Character->name]],
                ['name' => 'Collections', 'route' => 'collections', 'route_params' => ['user_name' => $user->Character->name]],
                ['name' => optional($collection)->name],
            ]
        ]);
    })->name('collection')->middleware('terms', 'auth', 'verified');

    Route::get('/collaborations', function () {
        return view('components.layout', [
            'view' => 'collaborations',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => auth()->user()->Character->name, 'route' => 'user-profile', 'route_params' => ['user_name' => auth()->user()->Character->name]],
                ['name' => 'Collaborations'],
            ]
        ]);
    })->name('collaborations')->middleware('terms', 'auth', 'verified');

    Route::get('/collaboration/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'collaboration',
            'properties' => ['collaboration_id' => $id],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => auth()->user()->Character->name, 'route' => 'user-profile', 'route_params' => ['user_name' => auth()->user()->Character->name]],
                ['name' => 'Collaborations', 'route' => 'collaborations'],
                ['name' => 'Collaboration Review'],
            ]
        ]);
    })->name('collaboration')->middleware('terms', 'auth', 'verified');

    Route::get('/system/{system_slug}', function ($system_slug) {
        return view('components.layout', [
            'view' => 'system-posts',
            'properties' => ['system_slug' => $system_slug],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => \App\Models\System::where('slug', $system_slug)->first()->name],
            ]
        ]);
    })->name('system-posts')->middleware('terms', 'auth', 'verified');

    Route::get('/category/{category_slug}', function ($category_slug) {
        return view('components.layout', [
            'view' => 'category-posts',
            'properties' => ['category_slug' => $category_slug],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => \App\Models\Category::where('slug', $category_slug)->first()->name],
            ]
        ]);
    })->name('category-posts')->middleware('terms', 'auth', 'verified');

    Route::get('/tag-list', function () {
        return view('components.layout', [
            'view' => 'tag-list',
            'properties' => [],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Tags'],
            ]
        ]);
    })->name('tag-list')->middleware('terms', 'auth', 'verified');

    Route::get('/tag/{tag_slug}', function ($tag_slug) {
        return view('components.layout', [
            'view' => 'tag-posts',
            'properties' => ['tag_slug' => $tag_slug],
            'show_breadcrumbs' => true,
            'breadcrumbs' => [
                ['name' => 'Tags', 'route' => 'tag-list'],
                ['name' => \App\Models\Tag::where('slug', $tag_slug)->first()->name],
            ]
        ]);
    })->name('tag-posts')->middleware('terms', 'auth', 'verified');

    Route::get('/{slug}', function ($slug) {
        return view('components.layout', [
            'view' => 'post',
            'properties' => ['slug' => $slug]
        ]);
    })->name('post')->middleware('terms', 'auth', 'verified');
