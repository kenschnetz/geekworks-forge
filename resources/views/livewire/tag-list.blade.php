<div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
    <div class="hidden lg:block lg:col-span-3">
        @include('components.feed.left-sidebar')
    </div>
    <main class="lg:col-span-9">
        @include('components.list-search')
        <div class="mt-3 overflow-hidden divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-px">
            @foreach ($tags as $tag)
                <div class="md:col-span-1 relative group bg-white dark:bg-zinc-700 p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 md:flex">
                    <div>
                        <a href="{{ route('tag-posts', ['tag_slug' => $tag->slug]) }}">
                            <h3 class="text-purple-700 text-lg font-bold text-gray-500 hover:underline cursor-pointer">
                                {{ $tag->name }} <i class="fas fa-caret-right ml-3"></i>
                            </h3>
                        </a>
                        <p class="mt-2 text-sm">
                            {{ $tag->description }}.
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $tags->links() }}
        </div>
    </main>
</div>
