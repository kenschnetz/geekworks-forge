<div class="w-full lg:block lg:col-span-3 mb-3 sm:p-0 sticky top-4 space-y-4">
    <div class="bg-white dark:bg-zinc-700 shadow p-4">
        @if($editing)
            <div class="mt-3 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
            <hr class="mt-3" />
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
        @else
            @if(!$my_profile && auth()->check())
                <div class="mb-3 text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer" wire:click="ToggleFollow()">
                    @if($following)
                        <i class="mr-3 fas fa-user-minus text-red-600 dark:text-red-500"></i>
                        <span class="hover:underline">Unfollow</span>
                    @else
                        <i class="mr-3 fas fa-user-plus text-purple-700 dark:text-purple-500"></i>
                        <span class="hover:underline">Follow</span>
                    @endif
                </div>
                <a href="{{ route('messenger', ['action' => 'new', 'actionable_id' => $profile_user->id]) }}" class="mb-3 text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer">
                    <i class="mr-3 fas fa-comment text-purple-700 dark:text-purple-500"></i>
                    <span c lass="hover:underline">Send Message</span>
                </a>
            @endif
            @if($can_edit)
                <div class="mb-3 text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer" wire:click="EnableEditMode()">
                    <i class="mr-3 fas fa-edit text-purple-700 dark:text-purple-500"></i>
                    <span class="hover:underline">Edit Profile</span>
                </div>
            @endif
            @if(!auth()->check())
                <div class="text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer">
                    <i class="mr-3 fas fa-user-plus text-purple-700 dark:text-purple-500"></i>
                    <a href="{{ route('login') }}" class="hover:underline">Follow</a>
                </div>
            @endif
            <div class="mt-3">
                <a href="{{ route('user-posts', ['user_name' => $user_name]) }}" class="text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer">
                    <i class="mr-3 fas fa-list text-purple-700 dark:text-purple-500"></i>
                    <span class="hover:underline">Posts</span>
                </a>
                @if(auth()->check())
                    <a href="{{ route('canons', ['user_name' => $user_name]) }}" class="mt-3 text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer">
                        <i class="mr-3 fas fa-globe text-purple-700 dark:text-purple-500"></i>
                        <span class="hover:underline">Canons</span>
                    </a>
                    <a href="{{ route('collections', ['user_name' => $user_name]) }}" class="mt-3 text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer">
                        <i class="mr-3 fas fa-layer-group text-purple-700 dark:text-purple-500"></i>
                        <span class="hover:underline">Collections</span>
                    </a>
                @endif
            </div>
            @if($my_profile)
                <div class="mt-3">
                    <a href="{{ route('collaborations') }}" class="mt-3 text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer">
                        <i class="mr-3 fas fa-people-arrows text-purple-700 dark:text-purple-500"></i>
                        <span class="hover:underline">Collaborations</span>
                    </a>
                </div>
            @endif
        @endif
    </div>
</div>
