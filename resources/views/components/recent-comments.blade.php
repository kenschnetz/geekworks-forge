<div class="mt-3">
    <ul role="list">
        @foreach($recent_comments as $recent_comment)
            <div class="flex py-2">
                <div class="min-w-0 flex-1">
                <div class="min-w-0 flex-1">
                    <p class="font-medium text-gray-900">
                        <a href="{{ route('post', ['slug' => $recent_comment['post']['slug']]) }}" class="hover:underline font-medium text-purple-700">
                            "{{ Str::limit($recent_comment['comment']) }}"
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </ul>
</div>
