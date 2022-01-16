<div class="mt-3">
    <ul role="list">
{{--        TODO: score top posts by views, comments and upvotes, not just upvotes--}}
        @foreach($top_posts as $top_post)
            <div class="flex py-2">
                <div class="min-w-0 flex-1">
                    <p class="font-medium text-gray-900">
                        <a href="{{ route('post', ['slug' => $top_post['slug']]) }}" class="hover:underline font-medium text-purple-700">
                            {{ $top_post['active_post_details']['title'] }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </ul>
</div>
