<div class="flex space-x-6">
    <p class="text-sm text-gray-400">
        <a href="{{ route('system-posts', ['system_slug' => $post->System->slug]) }}" class="hover:underline">
            {{ $post->System->name }}
        </a>
        <span class="mx-1">-</span>
        <a href="{{ route('category-posts', ['category_slug' => $post->Category->slug]) }}" class="hover:underline">
            {{ $post->Category->name }}
        </a>
    </p>
</div>
