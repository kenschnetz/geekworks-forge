<div class="w-full lg:block lg:col-span-3 mb-3 px-4 sm:p-0 sticky top-4 space-y-4">
    <div class="bg-white shadow py-4">
        <div class="px-4">
            @if(auth()->user()->id !== $profile_user->id)
                <div class="mb-3 text-gray-900 group flex items-center cursor-pointer" wire:click="ToggleFollow()">
                    @if($following)
                        <i class="mr-3 fas fa-user-minus text-red-600"></i>
                    @else
                        <i class="mr-3 fas fa-user-plus text-purple-800"></i>
                    @endif
                    <span class="hover:underline">Follow</span>
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
        </div>
        <hr class="mt-3" />
        <div class="mt-3 px-4">
            <a href="{{ route('user-posts', ['user_name' => $user_name]) }}" class="text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-list text-purple-800"></i>
                <span class="hover:underline">Posts</span>
            </a>
            <a href="{{ route('canons', ['user_name' => $user_name]) }}" class="mt-3 text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-globe text-purple-800"></i>
                <span class="hover:underline">Canons</span>
            </a>
            <a href="{{ route('user-posts', ['user_name' => $user_name]) }}" class="mt-3 text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-layer-group text-purple-800"></i>
                <span class="hover:underline">Collections</span>
            </a>
        </div>
    </div>
</div>
