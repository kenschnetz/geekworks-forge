<nav {{ $attributes->merge(['class', 'style']) }}>
    <a href="{{route('user-profile')}}" class="text-gray-500 dark:text-gray-300 group flex items-center p-2">
        <i class="fal fa-user-circle text-center" style="width: 28px !important;"></i>
        <span class="ml-3 font-medium tracking-wider inline-block align-middle hover:underline">
            Profile
        </span>
    </a>
    <a href="{{route('account')}}" class="text-gray-500 dark:text-gray-300 group flex items-center p-2">
        <i class="fal fa-cog text-center" style="width: 28px !important;"></i>
        <span class="ml-3 font-medium tracking-wider inline-block align-middle hover:underline">
            Account
        </span>
    </a>
    <a href="{{route('messenger')}}" class="text-gray-500 dark:text-gray-300 group flex items-center p-2">
        <i class="fal fa-comments text-center" style="width: 28px !important;"></i>
        <span class="ml-3 font-medium tracking-wider inline-block align-middle hover:underline">
            Messenger
        </span>
        @if(auth()->user()->MessengerNotifications())
            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full border border-white ml-2">
                {{ auth()->user()->MessengerNotifications() < 1000 ? auth()->user()->MessengerNotifications() : 999 . '+' }}
            </span>
        @endif
    </a>
{{--TODO: add notifications here--}}
    @if(optional(Auth()->user())->IsAdmin())
        <a href="{{route('admin-tools')}}" class="text-gray-500 dark:text-gray-300 group flex items-center p-2">
            <i class="fal fa-user-crown text-center" style="width: 28px !important;"></i>
            <span class="ml-3 font-medium tracking-wider inline-block align-middle hover:underline">
                Admin Tools
            </span>
        </a>
    @endif
    <a href="{{route('tickets')}}" class="text-gray-500 dark:text-gray-300 group flex items-center p-2">
        <i class="fal fa-hand-holding-medical text-center" style="width: 28px !important;"></i>
        <span class="ml-3 font-medium tracking-wider inline-block align-middle hover:underline">
            Help
        </span>
    </a>
    <a href="{{route('logout')}}" class="text-gray-500 dark:text-gray-300 group flex items-center p-2">
        <i class="fal fa-sign-out text-center" style="width: 28px !important;"></i>
        <span class="ml-3 font-medium tracking-wider inline-block align-middle hover:underline">
            Sign Out
        </span>
    </a>
</nav>
