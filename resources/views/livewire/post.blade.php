<div class="max-w-3xl mx-auto sm:px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-3">
    @section('page-title')
        {{ $post->ActivePostDetails->title }}
    @endsection
    <div class="hidden lg:block w-full lg:col-span-3 mb-3 px-4 sm:p-0">
        @include('components.post.view.details-left-sidebar')
    </div>
    <main class="lg:col-span-6">
        <div class="px-4 sm:p-0">
            <div class="bg-white dark:bg-zinc-700 px-4 py-6 shadow sm:p-6">
                <article aria-labelledby="question-title-81614" x-data="{ post_menu_open: false }">
                    <div class="flex space-x-3">
                        <div class="min-w-0 flex-1 relative">
                            <i @class(['float-right fas text-gray-300 text-center', 'fa-exclamation-square' => $post->post_type_id === 1, 'fa-question-square' => $post->post_type_id === 2, 'fa-rss-square' => $post->post_type_id === 3]) style="font-size: 1.4em !important; width: 32px !important;"></i>
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
                            {{ url($post->ActivePostDetails->Images->first()->Image->path) }}
                        @endsection
                        <div class="mt-3 space-y-4">
                            <img src="{{$post->ActivePostDetails->Images->first()->Image->path}}" class="mb-3" />
                        </div>
                        <hr class="mt-3" />
                    @endif
                    <div class="mt-3 space-y-4">
                        {!! $post->ActivePostDetails->content !!}
                    </div>
                </article>
            </div>
        </div>
        <div class="mt-3 md:hidden">
            @include('components.post.view.details-left-sidebar')
        </div>
        @if($post->Collaborators()->count() > 0)
            <div class="mt-3 px-4 sm:p-0 mb-3 lg:m-0">
                <div class="bg-white dark:bg-zinc-700 shadow">
                    <div class="p-6">
                        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                            Collaborators
                        </h2>
                        <hr class="mt-3" />
                        <div class="mt-2">
                            @foreach($post->Collaborators()->distinct('user_id')->get()->reverse() as $contributor)
                                <a href="{{ route('user-profile', ['user_name' => $contributor->Character->name]) }}" class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-orange-500 text-white border border-orange-500 hover:shadow hover:text-orange-500 hover:bg-white dark:bg-zinc-700">
                                    {{ $contributor->Character->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="hidden md:block mt-3 px-4 sm:p-0">
            @livewire('comments', ['post' => $post])
        </div>
    </main>
    @include('components.post.view.details-right-sidebar')
    <div class="md:hidden mt-3 px-4 sm:p-0">
        @livewire('comments', ['post' => $post])
    </div>
    @livewire('canonize-modal', ['post' => $post, 'post_details' => $post->ActivePostDetails, 'selected_items' => $canons, 'removed_items' => []])
    @livewire('collect-modal', ['post' => $post, 'post_details' => $post->ActivePostDetails, 'selected_items' => $collections, 'removed_items' => []])
</div>
