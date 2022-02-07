<x-sidebar>
    <div class="bg-white dark:bg-zinc-700 shadow p-4">
        <x-author :author="$item->User"></x-author>
        @if($item->user_id === auth()->user()->id && !$editing)
            <hr class="mt-3" />
            <div class="mt-3">
                <span class="text-gray-900 dark:text-gray-300 group flex items-center" wire:click="ToggleEditing()">
                    <i class="mr-3 fas fa-edit text-purple-700 dark:text-purple-500"></i>
                    <span class="hover:underline cursor-pointer">Edit</span>
                </span>
            </div>
        @endif
    </div>
</x-sidebar>
