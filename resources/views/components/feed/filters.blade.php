<div class="bg-white dark:bg-zinc-700 shadow mb-3">
    <div class="p-4">
        <h2 class="text-center font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider inline-block align-middle">
            Filters
        </h2>
        @if($allow_toggling_post_status ?? false)
            <hr class="my-3" />
            <div class="mt-3 w-full dark:text-gray-300">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="show_drafts" type="checkbox" name="toggle" id="toggle" class="text-purple-700 focus:ring-purple-700 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Show drafts
                </div>
            </div>
            <div class="mt-3 w-full dark:text-gray-300">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="show_moderated" type="checkbox" name="toggle" id="toggle" class="text-purple-700 focus:ring-purple-700 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Show moderated
                </div>
            </div>
        @endif
        <hr class="my-3" />
        @foreach($filters as $filter)
            <span class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-orange-600 text-white">
                {{ $filter }}
            </span>
        @endforeach
    </div>
</div>
