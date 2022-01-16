<div>
    <ul role="list">
        @foreach($posts as $post)
            <div class="flex py-2">
                <div class="min-w-0 flex-1">
                    <p class="font-medium text-gray-900">
                        <a href="{{ route('post', ['slug' => $post->slug]) }}" class="hover:underline font-medium text-purple-700">
                            {{ $post->ActivePostDetails->title }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </ul>
</div>
