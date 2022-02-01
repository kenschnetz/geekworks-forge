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

    Route::get('/test', function () {
        $details = [
            'title' => 'Mail from Geekworks Forge',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::to('ken@syntaxflow.com')->send(new MyTestMail($details));
        dd("Email is Sent.");
    });

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
            'properties' => []
        ]);
    })->name('admin-tools')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/users', function () {
        return view('components.layout', [
            'view' => 'users',
            'properties' => []
        ]);
    })->name('admin-users')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/user/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'user',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-user')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/user-violations', function () {
        return view('components.layout', [
            'view' => 'user-violations',
            'properties' => []
        ]);
    })->name('admin-user-violations')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/user-violation/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'user-violation',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-user-violation')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/user-mutes', function () {
        return view('components.layout', [
            'view' => 'user-mutes',
            'properties' => []
        ]);
    })->name('admin-user-mutes')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/user-mute/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'user-mute',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-user-mute')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/flags', function () {
        return view('components.layout', [
            'view' => 'flags',
            'properties' => []
        ]);
    })->name('admin-flags')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/flag/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'flag',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-flag')->middleware('terms', 'auth', 'admin', 'verified');

    Route::get('/admin/post-types', function () {
        return view('components.layout', [
            'view' => 'post-types',
            'properties' => []
        ]);
    })->name('admin-post-types')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/post-type/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'post-type',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-post-type')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/systems', function () {
        return view('components.layout', [
            'view' => 'systems',
            'properties' => []
        ]);
    })->name('admin-systems')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/system/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'system',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-system')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/categories', function () {
        return view('components.layout', [
            'view' => 'categories',
            'properties' => []
        ]);
    })->name('admin-categories')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/category/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'category',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-category')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/tags', function () {
        return view('components.layout', [
            'view' => 'tags',
            'properties' => []
        ]);
    })->name('admin-tags')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/tag/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'tag',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-tag')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/attributes', function () {
        return view('components.layout', [
            'view' => 'attributes',
            'properties' => []
        ]);
    })->name('admin-attributes')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/attribute/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'attribute',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-attribute')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/actions', function () {
        return view('components.layout', [
            'view' => 'actions',
            'properties' => []
        ]);
    })->name('admin-actions')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/action/{id?}', function ($id = null) {
        return view('components.layout', [
            'view' => 'action',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-action')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/bounties', function () {
        return view('components.layout', [
            'view' => 'bounties',
            'properties' => []
        ]);
    })->name('admin-bounties')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/bounty/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'bounty',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-bounty')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/quest-lines', function () {
        return view('components.layout', [
            'view' => 'quest-lines',
            'properties' => []
        ]);
    })->name('admin-quest-lines')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/quest-line/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'quest-line',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-quest-line')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/quests', function () {
        return view('components.layout', [
            'view' => 'quests',
            'properties' => []
        ]);
    })->name('admin-quests')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/quest/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'quest',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-quest')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/achievements', function () {
        return view('components.layout', [
            'view' => 'achievements',
            'properties' => []
        ]);
    })->name('admin-achievements')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/achievement/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'achievement',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-achievement')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/badges', function () {
        return view('components.layout', [
            'view' => 'badges',
            'properties' => []
        ]);
    })->name('admin-badges')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/admin/badge/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'badge',
            'properties' => ['item_id' => $id]
        ]);
    })->name('admin-badge')->middleware('terms', 'auth', 'staff', 'verified');

    Route::get('/images', function () {
        return view('components.layout', [
            'view' => 'images',
            'properties' => []
        ]);
    })->name('images')->middleware('terms', 'auth', 'verified');

    Route::get('/image/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'image',
            'properties' => ['item_id' => $id]
        ]);
    })->name('image')->middleware('terms', 'auth', 'verified');

    Route::get('/profile/{user_name?}', function ($user_name = null) {
        if (empty($user_name)) {
            $user_name = auth()->user()->Character->name;
        }
        return view('components.layout', [
            'view' => 'user-profile',
            'properties' => ['user_name' => $user_name]
        ]);
    })->name('user-profile')->middleware('terms', 'auth', 'verified');

    Route::get('/account/{notification?}', function ($notification = null) {
        return view('components.layout', [
            'view' => 'account',
            'properties' => ['notification' => $notification]
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
            'properties' => []
        ]);
    })->name('user-notifications')->middleware('terms', 'auth', 'verified');

    Route::get('/messenger/{action?}/{actionable_id?}', function ($action = null, $actionable_id = null) {
        return view('components.layout', [
            'view' => 'messenger',
            'properties' => ['action' => $action, 'actionable_id' => $actionable_id]
        ]);
    })->name('messenger')->middleware('terms', 'auth', 'verified');

    Route::get('/flag-content/{flaggable_id}/{flaggable_type}', function ($flaggable_id, $flaggable_type) {
        return view('components.layout', [
            'view' => 'flag-content',
            'properties' => [
                'flaggable_id' => $flaggable_id,
                'flaggable_type' => 'App\Models\\' . $flaggable_type
            ]
        ]);
    })->name('flag-content')->middleware('terms', 'auth', 'verified');

    Route::get('/new-post', function () {
        return view('components.layout', [
            'view' => 'new-post',
            'properties' => []
        ]);
    })->name('new-post')->middleware('terms', 'auth', 'verified');

    Route::get('/ideas/{user_id?}', function ($user_id = null) {
        return view('components.layout', [
            'view' => 'ideas',
            'properties' => ['user_id' => $user_id]
        ]);
    })->name('ideas')->middleware('terms', 'auth', 'verified');

    Route::get('/idea/{post_id}', function ($post_id) {
        return view('components.layout', [
            'view' => 'idea',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('idea')->middleware('terms', 'auth', 'verified');

    Route::get('/questions/{user_id?}', function ($user_id = null) {
        return view('components.layout', [
            'view' => 'questions',
            'properties' => ['user_id' => $user_id]
        ]);
    })->name('questions')->middleware('terms', 'auth', 'verified');

    Route::get('/question/{post_id?}', function ($post_id = null) {
        return view('components.layout', [
            'view' => 'question',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('question')->middleware('terms', 'auth', 'verified');

    Route::get('/articles/{user_id?}', function ($user_id = null) {
        return view('components.layout', [
            'view' => 'articles',
            'properties' => ['user_id' => $user_id]
        ]);
    })->name('articles')->middleware('terms', 'auth', 'verified');

    Route::get('/article/{post_id?}', function ($post_id = null) {
        return view('components.layout', [
            'view' => 'article',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('article')->middleware('terms', 'auth', 'verified');

    Route::get('/collaborate/{post_id}', function ($post_id) {
        return view('components.layout', [
            'view' => 'collaborate',
            'properties' => ['post_id' => $post_id, 'is_collaboration' => true]
        ]);
    })->name('collaborate')->middleware('terms', 'auth', 'verified');

    Route::get('/canons/{user_name?}', function ($user_name = null) {
        if (empty($user_name)) {
            $user_name = auth()->user()->Character->name;
        }
        return view('components.layout', [
            'view' => 'canons',
            'properties' => ['user_name' => $user_name]
        ]);
    })->name('canons')->middleware('terms', 'auth', 'verified');

    Route::get('/canon/{slug?}', function ($slug = null) {
        return view('components.layout', [
            'view' => 'canon',
            'properties' => ['slug' => $slug]
        ]);
    })->name('canon')->middleware('terms', 'auth', 'verified');

    Route::get('/collections/{user_name?}', function ($user_name = null) {
        if (empty($user_name)) {
            $user_name = auth()->user()->Character->name;
        }
        return view('components.layout', [
            'view' => 'collections',
            'properties' => ['user_name' => $user_name]
        ]);
    })->name('collections')->middleware('terms', 'auth', 'verified');

    Route::get('/collection/{slug?}', function ($slug = null) {
        return view('components.layout', [
            'view' => 'collection',
            'properties' => ['slug' => $slug]
        ]);
    })->name('collection')->middleware('terms', 'auth', 'verified');

    Route::get('/collaborations', function () {
        return view('components.layout', [
            'view' => 'collaborations',
            'properties' => []
        ]);
    })->name('collaborations')->middleware('terms', 'auth', 'verified');

    Route::get('/collaboration/{id}', function ($id) {
        return view('components.layout', [
            'view' => 'collaboration',
            'properties' => ['collaboration_id' => $id]
        ]);
    })->name('collaboration')->middleware('terms', 'auth', 'verified');

    Route::get('/system/{system_slug}', function ($system_slug) {
        return view('components.layout', [
            'view' => 'system-posts',
            'properties' => ['system_slug' => $system_slug]
        ]);
    })->name('system-posts')->middleware('terms', 'auth', 'verified');

    Route::get('/category/{category_slug}', function ($category_slug) {
        return view('components.layout', [
            'view' => 'category-posts',
            'properties' => ['category_slug' => $category_slug]
        ]);
    })->name('category-posts')->middleware('terms', 'auth', 'verified');

    Route::get('/tag-list', function () {
        return view('components.layout', [
            'view' => 'tag-list',
            'properties' => []
        ]);
    })->name('tag-list')->middleware('terms', 'auth', 'verified');

    Route::get('/tag/{tag_slug}', function ($tag_slug) {
        return view('components.layout', [
            'view' => 'tag-posts',
            'properties' => ['tag_slug' => $tag_slug]
        ]);
    })->name('tag-posts')->middleware('terms', 'auth', 'verified');

    Route::get('/{slug}', function ($slug) {
        return view('components.layout', [
            'view' => 'post',
            'properties' => ['slug' => $slug]
        ]);
    })->name('post')->middleware('terms', 'auth', 'verified');
