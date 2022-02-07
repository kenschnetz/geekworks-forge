<div class="max-w-2xl mx-auto sm:px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
    <div class="hidden lg:block lg:col-span-3">
        @include('components.feed.left-sidebar')
    </div>
    <main class="lg:col-span-6">
        <div class="px-4 sm:p-0">
            @include('components.list-search')
        </div>
        <div class="mt-3 px-4 sm:p-0 lg:hidden">
            @include('components.feed.right-sidebar')
        </div>
        <div class="mt-3 px-4 sm:p-0">
            @if($posts->count() > 0)
                <ul role="list" class="space-y-4">
                    @foreach($posts as $post)
                        <li class="bg-white dark:bg-zinc-700 p-4 shadow sm:p-6">
                            @include('components.post.view.preview ')
                        </li>
                    @endforeach
                </ul>
                @if ($posts->hasPages())
                    <hr class="my-3" />
                    {{ $posts->links() }}
                @endif
            @else
                <div class="bg-white dark:bg-zinc-700 p-4 shadow sm:p-6 dark:text-gray-300">
                    No posts Found!
                </div>
            @endif
        </div>
    </main>
    <div class="hidden lg:block lg:col-span-3">
        @include('components.feed.right-sidebar')
    </div>
</div>
