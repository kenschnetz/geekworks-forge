<div class="w-full lg:block lg:col-span-3 px-4 sm:p-0 mt-3 sm:mt-0">
{{--TODO: make this a component with slots so that it can be used by both the post and idea screens--}}
    <div class="sticky top-4 space-y-4">
        @if($post->ActivePostDetails->Attributes->count() <= 0 && $post->ActivePostDetails->Actions->count() <= 0)
            @include('components.post.view.tags')
        @endif
        @if($post->ActivePostDetails->Attributes->count() > 0)
            <div class="bg-white dark:bg-zinc-700 shadow">
                <div class="p-4">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Attributes
                    </h2>
                    <div class="mt-2">
                        @foreach($post->ActivePostDetails->Attributes as $post_attribute)
                            <div class="border border-gray-200 mt-2 p-2 text-sm">
                                <span class="font-bold">{{ $post_attribute->Attribute->name }}:</span> {{ $post_attribute->value }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if($post->ActivePostDetails->Actions->count() > 0)
            <div class="bg-white dark:bg-zinc-700 shadow">
                <div class="p-4">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Actions
                    </h2>
                    <div class="mt-2">
                        @foreach($post->ActivePostDetails->Actions as $post_action)
                            <div class="border border-gray-200 mt-2 p-2 text-sm">
                                <span class="font-bold">{{ $post_action->Action->name }}:</span> {{ $post_action->value }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
