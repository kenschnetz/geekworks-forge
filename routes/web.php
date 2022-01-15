<?php

    use App\Http\Livewire\AcceptTerms;
    use App\Http\Livewire\Terms;
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
    })->name('home')->middleware('terms');

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
    })->name('admin-tools')->middleware('terms', 'auth', 'admin');

    Route::get('/settings', function () {
        return view('components.layout', [
            'view' => 'settings',
            'properties' => []
        ]);
    })->name('settings')->middleware('terms', 'auth', 'staff');

    Route::get('/roles', function () {
        return view('components.layout', [
            'view' => 'roles',
            'properties' => []
        ]);
    })->name('roles')->middleware('terms', 'auth', 'staff');

    Route::get('/role/{role_id}', function ($role_id) {
        return view('components.layout', [
            'view' => 'role',
            'properties' => ['role_id' => $role_id]
        ]);
    })->name('role')->middleware('terms', 'auth', 'staff');

    Route::get('/users', function () {
        return view('components.layout', [
            'view' => 'users',
            'properties' => []
        ]);
    })->name('users')->middleware('terms', 'auth', 'staff');

    Route::get('/user/{userid}', function ($userid) {
        return view('components.layout', [
            'view' => 'user',
            'properties' => ['userid' => $userid]
        ]);
    })->name('user')->middleware('terms', 'auth', 'staff');

    Route::get('/user-violations', function () {
        return view('components.layout', [
            'view' => 'user-violations',
            'properties' => []
        ]);
    })->name('user-violations')->middleware('terms', 'auth', 'admin');

    Route::get('/user-violation/{violation_id}', function ($violation_id) {
        return view('components.layout', [
            'view' => 'user-violation',
            'properties' => ['violation_id' => $violation_id]
        ]);
    })->name('user-violation')->middleware('terms', 'auth', 'admin');

    Route::get('/user-mutes', function () {
        return view('components.layout', [
            'view' => 'user-mutes',
            'properties' => []
        ]);
    })->name('user-mutes')->middleware('terms', 'auth', 'admin');

    Route::get('/user-mute/{user_mute_id}', function ($user_mute_id) {
        return view('components.layout', [
            'view' => 'user-mute',
            'properties' => ['user_mute_id' => $user_mute_id]
        ]);
    })->name('user-mute')->middleware('terms', 'auth', 'admin');

    Route::get('/flag-review', function () {
        return view('components.layout', [
            'view' => 'flag-review',
            'properties' => []
        ]);
    })->name('flag-review')->middleware('terms', 'auth', 'admin');

    Route::get('/admin/systems', function () {
        return view('components.layout', [
            'view' => 'systems',
            'properties' => []
        ]);
    })->name('systems')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/system/{system_id}', function ($system_id) {
        return view('components.layout', [
            'view' => 'system',
            'properties' => ['system_id' => $system_id]
        ]);
    })->name('system')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/categories', function () {
        return view('components.layout', [
            'view' => 'categories',
            'properties' => []
        ]);
    })->name('categories')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/category/{category_id}', function ($category_id) {
        return view('components.layout', [
            'view' => 'category',
            'properties' => ['category_id' => $category_id]
        ]);
    })->name('category')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/tags', function () {
        return view('components.layout', [
            'view' => 'tags',
            'properties' => []
        ]);
    })->name('tags')->middleware('terms', 'auth', 'staff');

    Route::get('/admin/tag/{tag_id}', function ($tag_id) {
        return view('components.layout', [
            'view' => 'tag',
            'properties' => ['tag_id' => $tag_id]
        ]);
    })->name('tag')->middleware('terms', 'auth', 'staff');

    Route::get('/attributes', function () {
        return view('components.layout', [
            'view' => 'attributes',
            'properties' => []
        ]);
    })->name('attributes')->middleware('terms', 'auth', 'staff');

    Route::get('/attribute/{attribute_id}', function ($attribute_id) {
        return view('components.layout', [
            'view' => 'attribute',
            'properties' => ['attribute_id' => $attribute_id]
        ]);
    })->name('attribute')->middleware('terms', 'auth', 'staff');

    Route::get('/actions', function () {
        return view('components.layout', [
            'view' => 'actions',
            'properties' => []
        ]);
    })->name('actions')->middleware('terms', 'auth', 'staff');

    Route::get('/action/{action_id}', function ($action_id) {
        return view('components.layout', [
            'view' => 'action',
            'properties' => ['action_id' => $action_id]
        ]);
    })->name('action')->middleware('terms', 'auth', 'staff');

    Route::get('/post-types', function () {
        return view('components.layout', [
            'view' => 'post-types',
            'properties' => []
        ]);
    })->name('post-types')->middleware('terms', 'auth', 'staff');

    Route::get('/post-type/{post_type_id}', function ($post_type_id) {
        return view('components.layout', [
            'view' => 'post-type',
            'properties' => ['post_type_id' => $post_type_id]
        ]);
    })->name('post-type')->middleware('terms', 'auth', 'staff');

    Route::get('/bounties', function () {
        return view('components.layout', [
            'view' => 'bounties',
            'properties' => []
        ]);
    })->name('bounties')->middleware('terms', 'auth', 'staff');

    Route::get('/bounty/{bounty_id}', function ($bounty_id) {
        return view('components.layout', [
            'view' => 'bounty',
            'properties' => ['bounty_id' => $bounty_id]
        ]);
    })->name('bounty')->middleware('terms', 'auth', 'staff');

    Route::get('/quest-lines', function () {
        return view('components.layout', [
            'view' => 'quest-lines',
            'properties' => []
        ]);
    })->name('quest-lines')->middleware('terms', 'auth', 'staff');

    Route::get('/quest-line/{quest_line_id}', function ($quest_line_id) {
        return view('components.layout', [
            'view' => 'quest-line',
            'properties' => ['quest_line_id' => $quest_line_id]
        ]);
    })->name('quest-line')->middleware('terms', 'auth', 'staff');

    Route::get('/quests', function () {
        return view('components.layout', [
            'view' => 'quests',
            'properties' => []
        ]);
    })->name('quests')->middleware('terms', 'auth', 'staff');

    Route::get('/quest/{quest_id}', function ($quest_id) {
        return view('components.layout', [
            'view' => 'quest',
            'properties' => ['quest_id' => $quest_id]
        ]);
    })->name('quest')->middleware('terms', 'auth', 'staff');

    Route::get('/achievements', function () {
        return view('components.layout', [
            'view' => 'achievements',
            'properties' => []
        ]);
    })->name('achievements')->middleware('terms', 'auth', 'staff');

    Route::get('/achievement/{achievement_id}', function ($achievement_id) {
        return view('components.layout', [
            'view' => 'achievement',
            'properties' => ['achievement_id' => $achievement_id]
        ]);
    })->name('achievement')->middleware('terms', 'auth', 'staff');

    Route::get('/badges', function () {
        return view('components.layout', [
            'view' => 'badges',
            'properties' => []
        ]);
    })->name('badges')->middleware('terms', 'auth', 'staff');

    Route::get('/badge/{badge_id}', function ($badge_id) {
        return view('components.layout', [
            'view' => 'badge',
            'properties' => ['badge_id' => $badge_id]
        ]);
    })->name('badge')->middleware('terms', 'auth', 'staff');

    Route::get('/public-messages', function () {
        return view('components.layout', [
            'view' => 'public-messages',
            'properties' => []
        ]);
    })->name('public-messages')->middleware('terms', 'auth', 'tester');

    Route::get('/private-messages', function () {
        return view('components.layout', [
            'view' => 'private-messages',
            'properties' => []
        ]);
    })->name('private-messages')->middleware('terms', 'auth');

    Route::get('/images', function () {
        return view('components.layout', [
            'view' => 'images',
            'properties' => []
        ]);
    })->name('images')->middleware('terms', 'auth');

    Route::get('/image/{image_id}', function ($image_id) {
        return view('components.layout', [
            'view' => 'image',
            'properties' => ['image_id' => $image_id]
        ]);
    })->name('image')->middleware('terms', 'auth');

    Route::get('/profile/{user_id?}', function ($user_id = null) {
        if (empty($user_id)) {
            $user_id = Auth()->user()->id;
        }
        return view('components.layout', [
            'view' => 'user-profile',
            'properties' => ['user_id' => $user_id]
        ]);
    })->name('user-profile')->middleware('terms', 'auth');

    Route::get('/user-notifications', function () {
        return view('components.layout', [
            'view' => 'user-notifications',
            'properties' => []
        ]);
    })->name('user-notifications')->middleware('terms', 'auth');

    Route::get('/messenger/{action?}/{actionable_id?}', function ($action = null, $actionable_id = null) {
        return view('components.layout', [
            'view' => 'messenger',
            'properties' => ['action' => $action, 'actionable_id' => $actionable_id]
        ]);
    })->name('messenger')->middleware('terms', 'auth');

    Route::get('/flag/{flaggable_id}/{flaggable_type}', function ($flaggable_id, $flaggable_type) {
        return view('components.layout', [
            'view' => 'flag',
            'properties' => [
                'flaggable_id' => $flaggable_id,
                'flaggable_type' => 'App\Models\\' . $flaggable_type
            ]
        ]);
    })->name('flag')->middleware('terms', 'auth');

    Route::get('/new-post', function () {
        return view('components.layout', [
            'view' => 'new-post',
            'properties' => []
        ]);
    })->name('new-post')->middleware('terms', 'auth');

    Route::get('/ideas/{user_id?}', function ($user_id = null) {
        return view('components.layout', [
            'view' => 'ideas',
            'properties' => ['user_id' => $user_id]
        ]);
    })->name('ideas')->middleware('terms', 'auth');

    Route::get('/idea/{post_id}', function ($post_id) {
        return view('components.layout', [
            'view' => 'idea',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('idea')->middleware('terms', 'auth');

    Route::get('/questions/{user_id?}', function ($user_id = null) {
        return view('components.layout', [
            'view' => 'questions',
            'properties' => ['user_id' => $user_id]
        ]);
    })->name('questions')->middleware('terms', 'auth');

    Route::get('/question/{post_id?}', function ($post_id = null) {
        return view('components.layout', [
            'view' => 'question',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('question')->middleware('terms', 'auth');

    Route::get('/articles/{user_id?}', function ($user_id = null) {
        return view('components.layout', [
            'view' => 'articles',
            'properties' => ['user_id' => $user_id]
        ]);
    })->name('articles')->middleware('terms', 'auth');

    Route::get('/article/{post_id?}', function ($post_id = null) {
        return view('components.layout', [
            'view' => 'article',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('article')->middleware('terms', 'auth');

    Route::get('/canons', function () {
        return view('components.layout', [
            'view' => 'canons',
            'properties' => []
        ]);
    })->name('canons')->middleware('terms', 'auth');

    Route::get('/canon/{canon_id?}', function ($canon_id = null) {
        return view('components.layout', [
            'view' => 'canon',
            'properties' => ['canon_id' => $canon_id]
        ]);
    })->name('canon')->middleware('terms', 'auth');

    Route::get('/canonize/{post_id}', function ($post_id) {
        return view('components.layout', [
            'view' => 'canonize',
            'properties' => ['canon_id' => $post_id]
        ]);
    })->name('canonize')->middleware('terms', 'auth');

    Route::get('/collections', function () {
        return view('components.layout', [
            'view' => 'collections',
            'properties' => []
        ]);
    })->name('collections')->middleware('terms', 'auth');

    Route::get('/collection/{collection_id?}', function ($collection_id = null) {
        return view('components.layout', [
            'view' => 'collection',
            'properties' => ['collection_id' => $collection_id]
        ]);
    })->name('collection')->middleware('terms', 'auth');

    Route::get('/collect/{post_id}', function ($post_id) {
        return view('components.layout', [
            'view' => 'collect',
            'properties' => ['post_id' => $post_id]
        ]);
    })->name('collect')->middleware('terms', 'auth');

    Route::get('/system/{system_slug}', function ($system_slug) {
        return view('components.layout', [
            'view' => 'system-posts',
            'properties' => ['system_slug' => $system_slug]
        ]);
    })->name('system-posts')->middleware('terms', 'auth');

    Route::get('/category/{category_slug}', function ($category_slug) {
        return view('components.layout', [
            'view' => 'category-posts',
            'properties' => ['category_slug' => $category_slug]
        ]);
    })->name('category-posts')->middleware('terms', 'auth');

    Route::get('/tag-list', function () {
        return view('components.layout', [
            'view' => 'tag-list',
            'properties' => []
        ]);
    })->name('tag-list')->middleware('terms', 'auth');

    Route::get('/tag/{tag_slug}', function ($tag_slug) {
        return view('components.layout', [
            'view' => 'tag-posts',
            'properties' => ['tag_slug' => $tag_slug]
        ]);
    })->name('tag-posts')->middleware('terms', 'auth');

    Route::get('/{slug}', function ($slug) {
        return view('components.layout', [
            'view' => 'post',
            'properties' => ['slug' => $slug]
        ]);
    })->name('post')->middleware('terms', 'auth');
