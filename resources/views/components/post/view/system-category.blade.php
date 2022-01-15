<div class="flex space-x-6">
    <p class="text-sm text-gray-400">
        @if($post->System->id !== 1)
            <a href="{{ route('system-posts', ['system_slug' => $post->System->slug]) }}" class="hover:underline">
                {{ $post->System->name }}
            </a>
        @endif
        @if($post->System->id !== 1 && $post->Category->id !== 1)
            <span class="mx-1">-</span>
        @endif
        @if($post->Category->id !== 1)
            <a href="{{ route('category-posts', ['category_slug' => $post->Category->slug]) }}" class="hover:underline">
                {{ $post->Category->name }}
            </a>
        @endif
    </p>
</div>
