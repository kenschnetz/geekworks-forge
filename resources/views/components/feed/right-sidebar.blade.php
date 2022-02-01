<div class="sticky top-4">
    @if(count($filters) > 0)
        @include('components.feed.filters')
    @endif
    @if(count($top_posts) > 0)
        <div class="bg-white dark:bg-zinc-700 shadow mb-3">
            <div class="p-4">
                <h2 class="text-center font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider inline-block align-middle">
                    Top Posts
                </h2>
                <hr class="mt-3" />
                @include('components.top-posts')
            </div>
        </div>
    @endif
    @if(count($top_authors) > 0)
        <div class="bg-white dark:bg-zinc-700 shadow">
            <div class="p-4">
                <h2 class="text-center font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider inline-block align-middle">
                    Top Posters
                </h2>
                <hr class="mt-3" />
                @include('components.top-authors')
            </div>
        </div>
    @endif
</div>

