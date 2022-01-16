<article x-data="{ post_menu_open: false }">
    <div class="mt-2 relative">
        <i @class(['absolute top-0 right-0 fas text-gray-300 text-center', 'fa-exclamation-square' => $post->post_type_id === 1, 'fa-question-square' => $post->post_type_id === 2, 'fa-rss-square' => $post->post_type_id === 3]) style="font-size: 1.4em !important; width: 32px !important;"></i>
        <div class="flex space-x-3">
            <x-author :author="$post->User"></x-author>
        </div>
    </div>
    @if(!empty($post->ActivePostDetails->Images->first()->Image))
        <div class="mt-3">
            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="block">
                <div>
                    <div style="width: 100%; margin: 0 auto; padding-bottom: 50%; background-image: url({{$post->ActivePostDetails->Images->first()->Image->path}}); background-size: cover; background-position: center center" />
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
    @if($post->System->id !== 1 || $post->Category->id !== 1)
        <div class="mt-1">
            @include('components.post.view.system-category')
        </div>
    @endif
    <div class="mt-3 text-sm text-gray-500">
        <i>{{ $post->ActivePostDetails->description }}</i>
    </div>
    <hr class="mt-3" />
    <div class="mt-3 flex justify-between space-x-8">
        @include('components.post.view.stats')
    </div>
</article>
