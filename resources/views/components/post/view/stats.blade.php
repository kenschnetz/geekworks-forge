<div class="w-full">
    <div class="flex">
        <div class="inline-block flex items-center space-x-2  text-sm text-gray-300 mr-3">
            <i class="fas fa-thumbs-up"></i>
            <span class="font-semi-bold text-gray-500">{{ App\Utilities\Number::Shorten($post->upvotes_count) }}</span>
        </div>
        <div class="inline-block flex items-center space-x-2  text-sm text-gray-300 mr-3">
            <i class="fas fa-comment-alt"></i>
            <span class="font-semi-bold text-gray-500">{{ App\Utilities\Number::Shorten($post->comments_count) }}</span>
        </div>
        <div class="inline-block flex items-center space-x-2  text-sm text-gray-300 mr-3">
            <i class="fas fa-eye"></i>
            <span class="font-semi-bold text-gray-500">{{ App\Utilities\Number::Shorten($post->views_count) }}</span>
        </div>
        {{--TODO: figure out where to put this--}}
    </div>
{{--    <div class="text-sm text-gray-300 text-right">--}}
{{--        {{ $post->created_at->diffForHumans() }}--}}
{{--    </div>--}}
</div>

