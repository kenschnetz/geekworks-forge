<div class="mt-3">
    <ul role="list">
{{--        TODO: score top posts by views, comments and upvotes, not just upvotes--}}
        @foreach($recent_posts as $recent_post)
            <div class="flex py-2">
                <div class="min-w-0 flex-1">
                    <p class="font-medium text-gray-900">
                        <a href="{{ route('post', ['slug' => $recent_post['slug']]) }}" class="hover:underline font-medium text-purple-700">
                            {{ $recent_post['active_post_details']['title'] }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </ul>
</div>
