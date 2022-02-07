<div class="w-full">
    <div class="flex">
        <div class="inline-block flex items-center space-x-2 text-sm text-gray-300 mr-3">
            <i class="fas fa-thumbs-up"></i>
            <span class="font-semi-bold text-gray-500 dark:text-gray-300">{{ App\Utilities\Number::Shorten($post->upvotes_count) }}</span>
        </div>
        <div class="inline-block flex items-center space-x-2 text-sm text-gray-300 mr-3">
            <i class="fas fa-comment-alt"></i>
            <span class="font-semi-bold text-gray-500 dark:text-gray-300">{{ App\Utilities\Number::Shorten($post->comments_count) }}</span>
        </div>
        <div class="inline-block flex items-center space-x-2 text-sm text-gray-300 mr-3">
            <i class="fas fa-eye"></i>
            <span class="font-semi-bold text-gray-500 dark:text-gray-300">{{ App\Utilities\Number::Shorten($post->views_count) }}</span>
        </div>
        @if($is_feed ?? false)
            <div class="inline-block ml-auto text-sm text-gray-300 text-right">
                {{ $post->created_at->diffForHumans() }}
            </div>
        @endif
    </div>
</div>

