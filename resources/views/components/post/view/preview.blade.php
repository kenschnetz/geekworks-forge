<article x-data="{ post_menu_open: false }">
    <div class="mt-2">
        <div class="flex space-x-3">
            <div class="flex-shrink-0">
                <a href="{{ route('user-profile', ['user_id' => $post->User->id]) }}">
                    <img class="h-10 w-10 rounded-full" src="{{empty(Auth()->user()->Character->ProfilePhoto->path) ? '/storage/img/default-profile.jpg' : Auth()->user()->Character->ProfilePhoto->path}}" alt="">
                </a>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-sm font-medium text-gray-900">
                    <a href="{{ route('user-profile', ['user_id' => $post->User->id]) }}" class="hover:underline text-purple-700">
                        {{ $post->User->Character->name }}
                    </a>
                </p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
    @if(!empty($post->ActivePostDetails->Images->first()))
        <div class="mt-3">
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="block">
                <div>
                    <div style="width: 100%; margin: 0 auto; padding-bottom: 100%; background-image: url({{$post->ActivePostDetails->Images->first()->path}}); background-size: cover; background-position: center center" />
                </div>
            </a>
        </div>
    @endif
    <div class="mt-3">
        <h2 class="mt-4 text-base font-medium text-gray-900">
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="hover:underline text-purple-700">
                <strong>{{ $post->ActivePostDetails->title }}</strong>
            </a>
        </h2>
    </div>
    <div class="mt-1">
        @include('components.post.view.system-category')
    </div>
    <div class="mt-3 text-sm text-gray-500">
        <i>{{ $post->ActivePostDetails->description }}</i>
    </div>
    <hr class="mt-3" />
    <div class="mt-3 flex justify-between space-x-8">
        @include('components.post.view.stats')
    </div>
</article>
