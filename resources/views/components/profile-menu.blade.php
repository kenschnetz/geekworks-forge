<nav {{ $attributes->merge(['class', 'style']) }}>
    <a href="{{route('user-profile')}}" class="text-gray-900 group flex items-center px-3 py-2">
        <i class="fal fa-user-circle text-gray-900 text-center" style="font-size: 1.4em !important; width: 32px !important;"></i>
        <span class="ml-3 font-medium text-gray-500 tracking-wider inline-block align-middle hover:underline">
            Your Profile
        </span>
    </a>
    <a href="{{route('messenger')}}" class="text-gray-900 group flex items-center px-3 py-2">
        <i class="fal fa-comments text-gray-900 text-center" style="font-size: 1.4em !important; width: 32px !important;"></i>
        <span class="ml-3 font-medium text-gray-500 tracking-wider inline-block align-middle hover:underline">
            Messenger
        </span>
        @if(auth()->user()->MessengerNotifications())
        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full border border-white ml-2">
            {{ auth()->user()->MessengerNotifications() < 1000 ? auth()->user()->MessengerNotifications() : 999 . '+' }}
        </span>
        @endif
    </a>
{{--TODO: add notifications here--}}
    @if(Auth()->user()->IsAdmin())
        <a href="{{route('admin-tools')}}" class="text-gray-900 group flex items-center px-3 py-2">
            <i class="fal fa-cog text-gray-900 text-center" style="font-size: 1.4em !important; width: 32px !important;"></i>
            <span class="ml-3 font-medium text-gray-500 tracking-wider inline-block align-middle hover:underline">
                Admin Tools
            </span>
        </a>
    @endif
    <a href="{{route('logout')}}" class="text-gray-900 group flex items-center px-3 py-2">
        <i class="fal fa-sign-out text-gray-900 text-center" style="font-size: 1.4em !important; width: 32px !important;"></i>
        <span class="ml-3 font-medium text-gray-500 tracking-wider inline-block align-middle hover:underline">
            Sign Out
        </span>
    </a>
</nav>
