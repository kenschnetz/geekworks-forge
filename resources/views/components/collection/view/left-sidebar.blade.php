<x-sidebar>
    <div class="bg-white dark:bg-zinc-700 shadow p-4">
        <x-author :author="$item->User"></x-author>
    </div>
    @if($item->user_id === auth()->user()->id && !$editing)
        <div class="mt-4 bg-white dark:bg-zinc-700 shadow p-4">
            <span class="text-gray-900 group flex items-center" wire:click="ToggleEditing()">
                <i class="mr-3 fas fa-edit text-purple-800"></i>
                <span class="hover:underline">Edit</span>
            </span>
        </div>
    @endif
</x-sidebar>
