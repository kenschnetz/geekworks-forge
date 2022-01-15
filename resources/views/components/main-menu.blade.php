<nav class="sticky top-4" wire:ignore>
    <div class="p-4 space-y-1">
        <a href="{{ route('home') }}" @class(['text-gray-900 group flex items-center py-2', 'px-3 bg-gray-200' => request()->routeIs('home')])>
            <i @class(['fa-home-alt text-center', 'fal text-gray-900' => !request()->routeIs('home'), 'fa text-orange-500' => request()->routeIs('home')]) style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Home
            </span>
        </a>
        <a href="{{ route('ideas') }}" @class(['text-gray-900 group flex items-center py-2 rounded-md', 'px-3 bg-gray-200' => request()->routeIs('ideas')])>
            <i @class(['fa-exclamation text-center', 'fal text-gray-900' => !request()->routeIs('ideas'), 'fa text-orange-500' => request()->routeIs('ideas')]) style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Ideas
            </span>
        </a>
        <a href="{{ route('questions') }}" @class(['text-gray-900 group flex items-center py-2', 'px-3 bg-gray-200' => request()->routeIs('questions')])>
            <i @class(['fa-question text-center', 'fal text-gray-900' => !request()->routeIs('questions'), 'fa text-orange-500' => request()->routeIs('questions')]) style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Questions
            </span>
        </a>
        <a href="{{ route('articles') }}" @class(['text-gray-900 group flex items-center py-2', 'px-3 bg-gray-200' => request()->routeIs('articles')])>
            <i @class(['fa-rss text-center', 'fal text-gray-900' => !request()->routeIs('articles'), 'fa text-orange-500' => request()->routeIs('articles')]) style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Articles
            </span>
        </a>
    </div>
    <hr />
    <div class="p-4" x-data="{ show_systems: @entangle('menu_show_systems'), show_categories: @entangle('menu_show_categories') }" x-cloak>
        <a x-on:click="show_systems = !show_systems" @class(['cursor-pointer text-gray-900 group flex items-center py-2', 'px-3 bg-gray-200' => request()->routeIs('system-posts')])>
            <i @class(['fa-solar-system text-center', 'fal text-gray-900' => !request()->routeIs('system-posts'), 'fa text-orange-500' => request()->routeIs('system-posts')]) style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Systems <i x-show="!show_systems" class="ml-2 fas fa-caret-down"></i><i x-show="show_systems" class="ml-2 fas fa-caret-up"></i>
            </span>
        </a>
        <div x-show="show_systems" class="mt-3 px-4 space-y-2">
            @foreach(\App\Models\System::where('id', '!=', 1)->get() as $system)
                <a href="{{ route('system-posts', ['system_slug' => $system->slug]) }}"  @class(['group flex items-center px-3 py-1 font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-200', 'bg-gray-200' => Request::route('system_slug') === $system->slug])>
                    <span class="truncate">
                        {{ $system->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <a x-on:click="show_categories = !show_categories" @class(['cursor-pointer text-gray-900 group flex items-center py-2', 'px-3 bg-gray-200' => request()->routeIs('category-posts')])>
            <i @class(['fa-th-large text-center', 'fal text-gray-900' => !request()->routeIs('category-posts'), 'fa text-orange-500' => request()->routeIs('category-posts')]) style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Categories <i x-show="!show_categories" class="ml-2 fas fa-caret-down"></i><i x-show="show_categories" class="ml-2 fas fa-caret-up"></i>
            </span>
        </a>
        <div x-show="show_categories" class="mt-3 px-4 space-y-2">
            @foreach(\App\Models\Category::where('id', '!=', 1)->get() as $category)
                <a href="{{ route('category-posts', ['category_slug' => $category->slug]) }}"  @class(['group flex items-center px-3 py-1 font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-200', 'bg-gray-200' => Request::route('category_slug') === $category->slug])>
                    <span class="truncate">
                        {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <a href="{{ route('tag-list') }}" @class(['cursor-pointer text-gray-900 group flex items-center py-2', 'px-3 bg-gray-200' => request()->routeIs('tag-list') || request()->routeIs('tag-posts')])>
            <i @class(['fa-hashtag text-center', 'fal text-gray-900' => !request()->routeIs('tag-*'), 'fas text-orange-500' => request()->routeIs('tag-*')]) style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Tags
            </span>
        </a>
    </div>
</nav>
