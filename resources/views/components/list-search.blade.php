<div class="flex items-center">
    <div class="w-full">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                <i class="fas fa-search dark:text-gray-400"></i>
            </div>
            <input wire:model="search_term" id="search" name="search" class="block w-full bg-white dark:bg-zinc-900 dark:text-gray-400 border border-gray-200 py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 sm:text-sm" placeholder="Search" type="search">
        </div>
    </div>
</div>
