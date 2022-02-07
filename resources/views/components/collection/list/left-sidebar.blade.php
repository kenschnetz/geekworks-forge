<x-sidebar>
    <div class="bg-white dark:bg-zinc-700 shadow mb-3">
        <div class="p-4">
            <h2 class="text-center font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider inline-block align-middle">
                Collections
            </h2>
            <hr class="mt-3" />
            <a href="{{ route('collection') }}" class="mt-3 text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer">
                <i class="mr-3 fas fa-layer-group text-purple-700 dark:text-purple-500"></i>
                <span class="hover:underline">New Collection</span>
            </a>
        </div>
    </div>
</x-sidebar>
