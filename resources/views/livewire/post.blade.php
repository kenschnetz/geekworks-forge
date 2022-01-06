<div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
    @section('page-title')
        {{ $post->ActivePostDetails->title }}
    @endsection
    @include('components.post.view.details-left-sidebar')
    <main class="lg:col-span-6">
        <div class="px-4 sm:p-0">
            <div class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                <article aria-labelledby="question-title-81614" x-data="{ post_menu_open: false }">
                    <div class="flex space-x-3">
                        <div class="min-w-0 flex-1">
                            <h2 id="question-title-81614" class="text-lg font-bold text-gray-900">
                                {{ $post->ActivePostDetails->title }}
                            </h2>
                        </div>
                    </div>
                    @include('components.post.view.system-category')
                    @if(!empty($post->ActivePostDetails->description))
                        @section('page-description')
                            {{ url($post->ActivePostDetails->description) }}
                        @endsection
                        <div class="mt-3 text-sm text-gray-500">
                            <i>{{ $post->ActivePostDetails->description }}</i>
                        </div>
                        <hr class="mt-3" />
                    @endif
                    @if(!empty($post->ActivePostDetails->Images->first()))
                        @section('page-image')
                            {{ url($post->ActivePostDetails->Images->first()->path) }}
                        @endsection
                        <div class="mt-3 space-y-4">
                            <img src="{{$post->ActivePostDetails->Images->first()->path}}" class="mb-3" />
                        </div>
                        <hr class="mt-3" />
                    @endif
                    <div class="mt-3 space-y-4">
                        {!! $post->ActivePostDetails->content !!}
                    </div>
                </article>
            </div>
        </div>
        <div class="mt-6 px-4 sm:p-0">
            @include('components.comments')
        </div>
    </main>
    @include('components.post.view.details-right-sidebar')
</div>
