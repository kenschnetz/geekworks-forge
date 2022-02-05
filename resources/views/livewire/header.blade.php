<header id="header" class="bg-white dark:bg-zinc-700 shadow-sm" x-data="{ mobile_menu_open: false, profile_menu_open: false }">
    <div class="max-w-2xl mx-auto p-4 lg:max-w-7xl">
        <div class="relative flex justify-between">
            <div class="flex-1 flex xl:col-span-6">
                <a href="{{route('home')}}">
                    <x-application-logo></x-application-logo>
                </a>
            </div>
            <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-center">
                <a href="{{ route('post-search') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-bold text-sm shadow-sm text-white bg-purple-800 hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:purple-800 uppercase" style="width: 150px">
                    Search
                </a>
                <a href="{{ route('new-post') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-bold text-sm shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 uppercase" style="width: 150px">
                    New Post
                </a>
            </div>
            <div class="flex-1 flex items-center justify-end lg:hidden">
                <button @click="mobile_menu_open = !mobile_menu_open" type="button" class="-mx-2 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500" aria-expanded="false">
                    <i class="fas fa-bars fa-2x"></i>
                    @if($notifications)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center leading-none p-2 transform translate-x-3/4 translate-y-1/4 bg-red-600 rounded-full border border-white" />
                    @endif
                </button>
            </div>
            <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-end">
                <div class="flex-shrink-0 relative ml-5">
                    <div>
                        <button @click="profile_menu_open = !profile_menu_open" @click.away="profile_menu_open = false" type="button" class="bg-white dark:bg-zinc-700 rounded-full flex" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full border border-gray-300" src="{{$profile_image_path}}" alt="profile-image" />
                            @if($notifications > 0)
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center leading-none p-2 transform translate-x-1/2 -translate-y-1/3 bg-red-600 rounded-full border border-white" />
                            @endif
                        </button>
                    </div>
                    <div x-show="profile_menu_open" class="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-zinc-700 ring-1 ring-black ring-opacity-5 py-1 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <x-profile-menu class="text-sm text-gray-700"></x-profile-menu>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 lg:hidden flex">
            <a href="{{ route('post-search') }}" class="flex-1 p-4 flex align-middle justify-center border border-transparent font-bold text-sm shadow-sm text-white bg-purple-800 hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:purple-800 uppercase">
                Search
            </a>
            <a href="{{ route('new-post') }}" class="flex-1 p-4 flex align-middle justify-center border border-transparent font-bold text-sm shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 uppercase">
                New Post
            </a>
        </div>
    </div>
    <div x-show="mobile_menu_open">
        <x-main-menu class="py-5 border border-gray-200"></x-main-menu>
        <hr />
        <x-profile-menu class="py-5 text-sm font-semibold text-gray-500 uppercase tracking-wider align-middle"></x-profile-menu>
    </div>
</header>
