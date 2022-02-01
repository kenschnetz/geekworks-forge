<div class="bg-white dark:bg-zinc-700 shadow">
    <div class="p-4">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Tags
        </h2>
        <hr class="mt-2" />
        <div class="mt-2">
            @foreach($post->ActivePostDetails->Tags as $post_tag)
                <a href="{{ route('tag-posts', ['tag_slug' => $post_tag->Tag->slug]) }}" class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-purple-800 text-white border border-purple-800 hover:shadow hover:text-purple-800 hover:bg-white dark:bg-zinc-700">
                    {{ $post_tag->Tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>
