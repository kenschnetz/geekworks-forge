<div class="hidden lg:block lg:col-span-3">
    <div class="sticky top-4 space-y-4">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                    Tags
                </h2>
                <hr class="mt-3" />
                <div class="mt-2">
                    @foreach($post->ActivePostDetails->Tags as $post_tag)
                        <a href="{{ route('tag-posts', ['tag_slug' => $post_tag->Tag->slug]) }}" class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-purple-800 text-white border border-purple-800 hover:shadow hover:text-purple-800 hover:bg-white">
                            {{ $post_tag->Tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @if($post->ActivePostDetails->Attributes->count() > 0)
            <div class="mt-3 bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Attributes
                    </h2>
                    <div class="mt-2">
                        @foreach($post->ActivePostDetails->Attributes as $post_attribute)
                            <div class="border border-gray-200 mt-1 p-3">
                                <span class="font-bold">{{ $post_attribute->Attribute->name }}:</span> {{ $post_attribute->value }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if($post->ActivePostDetails->Actions->count() > 0)
            <div class="mt-3 bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Actions
                    </h2>
                    <hr class="mt-3" />
                    <div class="mt-3">
                        @foreach($post->ActivePostDetails->Actions as $post_action)
                            <div class="border border-gray-200 mt-3 p-4">
                                <p class="font-bold">
                                    {{ $post_action->Action->name }}:
                                </p>
                                <p class="mt-1 text-sm">
                                    {{ $post_action->value }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
