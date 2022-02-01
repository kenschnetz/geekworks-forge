<div class="w-full lg:block lg:col-span-3 mb-3 px-4 sm:p-0 sticky top-4 space-y-4">
    <div class="bg-white dark:bg-zinc-700 shadow p-4">
        @if(!$my_profile)
            <div class="mb-3 text-gray-900 group flex items-center cursor-pointer" wire:click="ToggleFollow()">
                @if($following)
                    <i class="mr-3 fas fa-user-minus text-red-600"></i>
                    <span class="hover:underline">Unfollow</span>
                @else
                    <i class="mr-3 fas fa-user-plus text-purple-800"></i>
                    <span class="hover:underline">Follow</span>
                @endif
            </div>
            <a href="{{ route('messenger', ['action' => 'new', 'actionable_id' => $profile_user->id]) }}" class="mb-3 text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-comment text-purple-800"></i>
                <span c lass="hover:underline">Send Message</span>
            </a>
        @endif
        @if($can_edit)
            <div class="mb-3 text-gray-900 group flex items-center cursor-pointer" wire:click="EnableEditMode()">
                <i class="mr-3 fas fa-edit text-purple-800"></i>
                <span class="hover:underline">Edit Profile</span>
            </div>
        @endif
        <hr class="mt-3" />
        <div class="mt-3">
            <a href="{{ route('user-posts', ['user_name' => $user_name]) }}" class="text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-list text-purple-800"></i>
                <span class="hover:underline">Posts</span>
            </a>
            <a href="{{ route('canons', ['user_name' => $user_name]) }}" class="mt-3 text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-globe text-purple-800"></i>
                <span class="hover:underline">Canons</span>
            </a>
            <a href="{{ route('collections', ['user_name' => $user_name]) }}" class="mt-3 text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-layer-group text-purple-800"></i>
                <span class="hover:underline">Collections</span>
            </a>
        </div>
        @if($my_profile)
            <div class="mt-3">
                <a href="{{ route('collaborations') }}" class="mt-3 text-gray-900 group flex items-center cursor-pointer">
                    <i class="mr-3 fas fa-people-arrows text-purple-800"></i>
                    <span class="hover:underline">Collaborations</span>
                </a>
            </div>
        @endif
    </div>
</div>
