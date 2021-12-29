<?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the web middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        if (Auth()) {
            return view('livewire.feed');
        } else {
            return view('livewire.home');
        }
    })->name('home');

    Route::get('/settings', function () {
        return view('livewire.settings');
    })->name('settings')->middleware(['Auth', 'Staff']);

    Route::get('/roles', function () {
        return view('livewire.roles');
    })->name('roles')->middleware(['Auth', 'Staff']);

    Route::get('/role//{id}', function ($id) {
        return view('livewire.role', ['id' => $id]);
    })->name('role')->middleware(['Auth', 'Staff']);

    Route::get('/users', function () {
        return view('livewire.users');
    })->name('users')->middleware(['Auth', 'Staff']);

    Route::get('/user/{id}', function ($id) {
        return view('livewire.user', ['id' => $id]);
    })->name('user')->middleware(['Auth', 'Staff']);

    Route::get('/user-violations', function () {
        return view('livewire.user-violations');
    })->name('user-violations')->middleware(['Auth', 'Admin']);

    Route::get('/user-violation/{id}', function ($id) {
        return view('livewire.user-violation', ['id' => $id]);
    })->name('user-violation')->middleware(['Auth', 'Admin']);

    Route::get('/user-mutes', function () {
        return view('livewire.user-mutes');
    })->name('user-mutes')->middleware(['Auth', 'Admin']);

    Route::get('/user-mute/{id}', function ($id) {
        return view('livewire.user-mute', ['id' => $id]);
    })->name('user-mute')->middleware(['Auth', 'Admin']);

    Route::get('/flag-review', function () {
        return view('livewire.flag-review');
    })->name('flag-review')->middleware(['Auth', 'Admin']);

    Route::get('/systems', function () {
        return view('livewire.systems');
    })->name('systems')->middleware(['Auth', 'Staff']);

    Route::get('/system/{id}', function ($id) {
        return view('livewire.system', ['id' => $id]);
    })->name('system')->middleware(['Auth', 'Staff']);

    Route::get('/categories', function () {
        return view('livewire.categories');
    })->name('categories')->middleware(['Auth', 'Staff']);

    Route::get('/category/{id}', function ($id) {
        return view('livewire.category', ['id' => $id]);
    })->name('category')->middleware(['Auth', 'Staff']);

    Route::get('/tags', function () {
        return view('livewire.tags');
    })->name('tags')->middleware(['Auth', 'Staff']);

    Route::get('/tag/{id}', function ($id) {
        return view('livewire.tag', ['id' => $id]);
    })->name('tag')->middleware(['Auth', 'Staff']);

    Route::get('/attributes', function () {
        return view('livewire.attributes');
    })->name('attributes')->middleware(['Auth', 'Staff']);

    Route::get('/attribute/{id}', function ($id) {
        return view('livewire.attribute', ['id' => $id]);
    })->name('attribute')->middleware(['Auth', 'Staff']);

    Route::get('/actions', function () {
        return view('livewire.actions');
    })->name('actions')->middleware(['Auth', 'Staff']);

    Route::get('/action/{id}', function ($id) {
        return view('livewire.action', ['id' => $id]);
    })->name('action')->middleware(['Auth', 'Staff']);

    Route::get('/post-types', function () {
        return view('livewire.post-types');
    })->name('post-types')->middleware(['Auth', 'Staff']);

    Route::get('/post-type/{id}', function ($id) {
        return view('livewire.post-type', ['id' => $id]);
    })->name('post-type')->middleware(['Auth', 'Staff']);

    Route::get('/bounties', function () {
        return view('livewire.bounties');
    })->name('bounties')->middleware(['Auth', 'Staff']);

    Route::get('/bounty/{id}', function ($id) {
        return view('livewire.bounty', ['id' => $id]);
    })->name('bounty')->middleware(['Auth', 'Staff']);

    Route::get('/quest-lines', function () {
        return view('livewire.quest-lines');
    })->name('quest-lines')->middleware(['Auth', 'Staff']);

    Route::get('/quest-line/{id}', function ($id) {
        return view('livewire.quest-line', ['id' => $id]);
    })->name('quest-line')->middleware(['Auth', 'Staff']);

    Route::get('/quests', function () {
        return view('livewire.quests');
    })->name('quests')->middleware(['Auth', 'Staff']);

    Route::get('/quest/{id}', function ($id) {
        return view('livewire.quest', ['id' => $id]);
    })->name('quest')->middleware(['Auth', 'Staff']);

    Route::get('/achievements', function () {
        return view('livewire.achievements');
    })->name('achievements')->middleware(['Auth', 'Staff']);

    Route::get('/achievement/{id}', function ($id) {
        return view('livewire.achievement', ['id' => $id]);
    })->name('achievement')->middleware(['Auth', 'Staff']);

    Route::get('/badges', function () {
        return view('livewire.badges');
    })->name('badges')->middleware(['Auth', 'Staff']);

    Route::get('/badge/{id}', function ($id) {
        return view('livewire.badge', ['id' => $id]);
    })->name('badge')->middleware(['Auth', 'Staff']);

    Route::get('/public-messages', function () {
        return view('livewire.public-messages');
    })->name('public-messages')->middleware(['Auth', 'Tester']);

    Route::get('/private-messages', function () {
        return view('livewire.private-messages');
    })->name('private-messages')->middleware(['Auth']);

    Route::get('/images', function () {
        return view('livewire.images');
    })->name('images')->middleware(['Auth']);

    Route::get('/image/{id}', function ($id) {
        return view('livewire.image', ['id' => $id]);
    })->name('image')->middleware(['Auth']);

    Route::get('/profile/{user_id?}', function ($user_id = null) {
        return view('livewire.user-profile', ['user_id' => $user_id]);
    })->name('user-profile')->middleware(['Auth']);

    Route::get('/flag', function () {
        return view('livewire.flag');
    })->name('flag')->middleware(['Auth']);

    Route::get('/ideas/{user_id?}', function ($user_id = null) {
        return view('livewire.ideas', ['user_id' => $user_id]);
    })->name('ideas')->middleware(['Auth']);

    Route::get('/idea/{id?}', function ($id = null) {
        return view('livewire.idea', ['id' => $id]);
    })->name('idea')->middleware(['Auth']);

    Route::get('/questions/{user_id?}', function ($user_id = null) {
        return view('livewire.questions', ['user_id' => $user_id]);
    })->name('questions')->middleware(['Auth']);

    Route::get('/question/{id?}', function ($id = null) {
        return view('livewire.question', ['id' => $id]);
    })->name('question')->middleware(['Auth']);

    Route::get('/articles/{user_id?}', function ($user_id = null) {
        return view('livewire.articles', ['user_id' => $user_id]);
    })->name('articles')->middleware(['Auth']);

    Route::get('/article/{id?}', function ($id = null) {
        return view('livewire.article', ['id' => $id]);
    })->name('article')->middleware(['Auth']);

    Route::get('/system/{system_slug}', function () {
        return view('livewire.system-posts');
    })->name('system-posts')->middleware(['Auth']);

    Route::get('/category/{category_slug}', function () {
        return view('livewire.category-posts');
    })->name('category-posts')->middleware(['Auth']);

    Route::get('/{slug}', function ($slug) {
        return view('livewire.post', ['slug' => $slug]);
    })->name('post')->middleware(['Auth']);

    require __DIR__ . '/auth.php';
