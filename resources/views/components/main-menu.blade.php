<nav wire:ignore>
    <div class="sm:p-4 lg:space-y-1">
        <a href="{{ route('home') }}" @class(['group flex items-center p-2 text-gray-500 dark:text-gray-300', 'bg-gray-200 dark:bg-zinc-900' => request()->routeIs('home')])>
            <i @class(['fa-home-alt text-center', 'fal text-gray-900 dark:text-gray-300' => !request()->routeIs('home'), 'fa text-orange-500' => request()->routeIs('home')]) style="width: 28px !important;"></i>
            <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Home
            </span>
        </a>
        <a href="{{ route('ideas') }}" @class(['group flex items-center p-2 text-gray-500 dark:text-gray-300', 'bg-gray-200 dark:bg-zinc-900' => request()->routeIs('ideas')])>
            <i @class(['fa-exclamation text-center', 'fal text-gray-900 dark:text-gray-300' => !request()->routeIs('ideas'), 'fa text-orange-500' => request()->routeIs('ideas')]) style="width: 28px !important;"></i>
            <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Ideas
            </span>
        </a>
        <a href="{{ route('questions') }}" @class(['group flex items-center p-2 text-gray-500 dark:text-gray-300', 'bg-gray-200 dark:bg-zinc-900' => request()->routeIs('questions')])>
            <i @class(['fa-question text-center', 'fal text-gray-900 dark:text-gray-300' => !request()->routeIs('questions'), 'fa text-orange-500' => request()->routeIs('questions')]) style="width: 28px !important;"></i>
            <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Questions
            </span>
        </a>
        <a href="{{ route('articles') }}" @class(['group flex items-center p-2 text-gray-500 dark:text-gray-300', 'bg-gray-200 dark:bg-zinc-900' => request()->routeIs('articles')])>
            <i @class(['fa-rss text-center', 'fal text-gray-900 dark:text-gray-300' => !request()->routeIs('articles'), 'fa text-orange-500' => request()->routeIs('articles')]) style="width: 28px !important;"></i>
            <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Articles
            </span>
        </a>
    </div>
    <hr />
    <div class="sm:p-4" x-data="{ show_systems: @entangle('menu_show_systems'), show_categories: @entangle('menu_show_categories') }" x-cloak>
        <a x-on:click="show_systems = !show_systems" @class(['group flex items-center p-2 text-gray-500 dark:text-gray-300 cursor-pointer', 'bg-gray-200 dark:bg-zinc-900' => request()->routeIs('system-posts')])>
            <i @class(['fa-solar-system text-center', 'fal text-gray-900 dark:text-gray-300' => !request()->routeIs('system-posts'), 'fa text-orange-500' => request()->routeIs('system-posts')]) style="width: 28px !important;"></i>
            <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Systems <i x-show="!show_systems" class="ml-2 fas fa-caret-down"></i><i x-show="show_systems" class="ml-2 fas fa-caret-up"></i>
            </span>
        </a>
        <div x-show="show_systems" class="mt-3 space-y-2 pl-4">
            @foreach(\App\Models\System::where('id', '!=', 1)->get() as $system)
                <a href="{{ route('system-posts', ['system_slug' => $system->slug]) }}"  @class(['group flex items-center py-1 px-2 text-sm font-medium text-gray-600 dark:text-gray-300 hover:underline', 'bg-gray-200 dark:bg-zinc-900' => Request::route('system_slug') === $system->slug])>
                    <span class="truncate">
                        {{ $system->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <a x-on:click="show_categories = !show_categories" @class(['group flex items-center p-2 text-gray-500 dark:text-gray-300 cursor-pointer', 'bg-gray-200 dark:bg-zinc-900' => request()->routeIs('category-posts')])>
            <i @class(['fa-th-large text-center', 'fal text-gray-900 dark:text-gray-300' => !request()->routeIs('category-posts'), 'fa text-orange-500' => request()->routeIs('category-posts')]) style="width: 28px !important;"></i>
            <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Categories <i x-show="!show_categories" class="ml-2 fas fa-caret-down"></i><i x-show="show_categories" class="ml-2 fas fa-caret-up"></i>
            </span>
        </a>
        <div x-show="show_categories" class="mt-3 px-4 space-y-2">
            @foreach(\App\Models\Category::where('id', '!=', 1)->get() as $category)
                <a href="{{ route('category-posts', ['category_slug' => $category->slug]) }}"  @class(['group flex items-center px-3 py-1 text-sm font-medium text-gray-600 dark:text-gray-300 hover:underline', 'bg-gray-200 dark:bg-zinc-900' => Request::route('category_slug') === $category->slug])>
                    <span class="truncate">
                        {{ $category->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <a href="{{ route('tag-list') }}" @class(['group flex items-center p-2 text-gray-500 dark:text-gray-300', 'bg-gray-200 dark:bg-zinc-900' => request()->routeIs('tag-list') || request()->routeIs('tag-posts')])>
            <i @class(['fa-hashtag text-center', 'fal text-gray-900 dark:text-gray-300' => !request()->routeIs('tag-*'), 'fas text-orange-500' => request()->routeIs('tag-*')]) style="width: 28px !important;"></i>
            <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                Tags
            </span>
        </a>
    </div>
    @if(!auth()->check())
        <hr class="lg:hidden" />
        <div class="lg:hidden sm:p-4 lg:space-y-1">
            <a href="{{ route('login') }}" class="group flex items-center p-2 text-gray-500 dark:text-gray-300">
                <i class="fal fa-sign-in text-gray-900 dark:text-gray-300 text-center" style="width: 28px !important;"></i>
                <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                    Login
                </span>
            </a>
            <a href="{{ route('register') }}" class="group flex items-center p-2 text-gray-500 dark:text-gray-300">
                <i class="fal fa-user-plus text-gray-900 dark:text-gray-300 text-center" style="width: 28px !important;"></i>
                <span class="ml-3 text-sm font-medium uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                    Register
                </span>
            </a>
        </div>
    @endif
</nav>
