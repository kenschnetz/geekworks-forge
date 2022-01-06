<div>
    <ul role="list" class="mt-3">
{{--        TODO: score top posts by views, comments and upvotes, not just upvotes--}}
        @foreach(\App\Models\Post::whereHas('Upvotes')->where('published', true)->where('moderated', false)->with('ActivePostDetails')->withCount('Upvotes')->orderBy('upvotes_count', 'DESC')->take(3)->get() as $popular_post)
            <div class="flex py-2">
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">
                        <a href="{{ route('post', ['slug' => $popular_post->slug]) }}" class="hover:underline font-medium text-purple-700">
                            {{ $popular_post->ActivePostDetails->title }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </ul>
</div>
