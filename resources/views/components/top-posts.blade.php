<div class="mt-3">
    <ul role="list">
{{--        TODO: score top posts by views, comments and upvotes, not just upvotes--}}
        @foreach($top_posts as $top_post)
            <div class="flex py-2">
                <div class="min-w-0 flex-1">
                    <p>
                        <a href="{{ route('post', ['slug' => $top_post['slug']]) }}" class="hover:underline font-medium text-purple-700 dark:text-purple-500">
                            {{ $top_post['active_post_details']['title'] }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </ul>
</div>
