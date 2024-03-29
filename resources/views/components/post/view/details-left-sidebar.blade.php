<div class="w-full lg:block lg:col-span-3 mb-3 px-4 sm:p-0 sticky top-4 space-y-4">
    <div class="bg-white dark:bg-zinc-700 shadow py-4">
        <div class="px-4">
            <div class="w-full">
                <x-author :author="$post->User"></x-author>
            </div>
        </div>
        <hr class="mt-3" />
        <div class="mt-3 px-4">
            @include('components.post.view.stats')
        </div>
        @if(auth()->check())
            <hr class="mt-3" />
            <div class="mt-3 px-4">
                @if($post->user_id === auth()->user()->id)
                    <a href="{{ match($post->post_type_id) { 1 => route('idea', ['post_id' => $post->id]), 2 => route('question', ['post_id' => $post->id]), 3 => route('article', ['post_id' => $post->id]) } }}" class="text-gray-900 dark:text-gray-300 group flex items-center" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                        <i class="mr-3 fas fa-edit text-purple-700 dark:text-purple-500" style="width: 28px"></i>
                        <span class="hover:underline">Edit</span>
                    </a>
                @endif
                @if($post->user->id !== auth()->user()->id)
                    <div wire:click="TogglePostUpvote({{auth()->user()->id}}, {{$post->id}})" class="cursor-pointer text-gray-900 dark:text-gray-300 group flex items-center mt-3" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                        @if($upvoted)
                            <i class="mr-3 fas fa-thumbs-down text-red-600 dark:text-red-500" style="width: 28px"></i>
                            <span class="hover:underline">Remove upvote</span>
                        @else
                            <i class="mr-3 fas fa-thumbs-up text-purple-700 dark:text-purple-500" style="width: 28px"></i>
                            <span class="hover:underline">Upvote</span>
                        @endif
                    </div>
                @endif
                @if($post->user_id === auth()->user()->id || !$post->locked_canon)
                    <div class="mt-3 flex items-center">
                        <span class="text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer" x-data="{}" x-on:click="window.livewire.emitTo('canonize-modal', 'Show')">
                            <i class="mr-3 fas fa-vector-square text-purple-700 dark:text-purple-500" style="width: 28px"></i>
                            <span class="hover:underline" x-data x-tooltip="Add this post to one of your Canons, or a public Canon">Canonize</span>
                        </span>
                        <i class="fa-solid fa-circle-question ml-auto flex-shrink text-gray-300 dark:text-zinc-400 lg:hidden" x-data @click="$tooltip('Add this post to one of your Canons, or a public Canon')"></i>
                    </div>
                @endif
                <div class="mt-3 flex items-center">
                    <span class="text-gray-900 dark:text-gray-300 group flex items-center cursor-pointer" x-data="{}" x-on:click="window.livewire.emitTo('collect-modal', 'Show')">
                        <i class="mr-3 fas fa-th-large text-purple-700 dark:text-purple-500" style="width: 28px"></i>
                        <span class="hover:underline" x-data x-tooltip="Add this post to one of your Collections">Collect</span>
                    </span>
                    <i class="fa-solid fa-circle-question ml-auto flex-shrink text-gray-300 dark:text-zinc-400 lg:hidden" x-data @click="$tooltip('Add this post to one of your Collections')"></i>
                </div>
                @if($post->Type->name === 'Idea' && !$has_open_collaboration && $post->user_id !== auth()->user()->id && $post->ActivePostDetails->requesting_collaborations)
                    <div class="mt-3 flex items-center">
                        <a href="{{ route('collaborate', ['post_id' => $post->id]) }}" class="text-gray-900 dark:text-gray-300 group flex flex-grow items-center" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                            <i class="mr-3 fas fa-file-edit text-purple-700 dark:text-purple-500" style="width: 28px"></i>
                            <span class="hover:underline" x-data x-tooltip="Collaborate with the author on this post by recommending changes">Collaborate</span>
                        </a><i class="fa-solid fa-circle-question ml-auto flex-shrink text-gray-300 dark:text-zinc-400 lg:hidden" x-data @click="$tooltip('Collaborate with the author on this post by recommending changes')"></i>
                    </div>
                @endif
            </div>
    {{--        <hr class="mt-3" />--}}
    {{--        TODO: add social sharing options--}}
    {{--        @include('components.post.view.share')--}}
            @if($post->user->id !== auth()->user()->id)
                <hr class="mt-3" />
                <div class="mt-3 px-4 flex items-center">
                    <a href="{{ route('flag-content', ['flaggable_id' => $post->id, 'flaggable_type' => 'Post']) }}" class="cursor-pointer text-gray-900 dark:text-gray-300 group flex flex-grow items-center" role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                        <i class="mr-3 fas fa-flag text-red-600 dark:text-red-500" style="width: 28px"></i>
                        <span class="hover:underline" x-data x-tooltip="Submit this post for admin review">Flag for Admin review</span>
                    </a><i class="fa-solid fa-circle-question ml-auto flex-shrink text-gray-300 dark:text-zinc-400 lg:hidden" x-data @click="$tooltip('Submit this post for admin review')"></i>
                </div>
            @endif
        @endif
    </div>
    @if($post->ActivePostDetails->Attributes->count() > 0 || $post->ActivePostDetails->Actions->count() > 0)
        @include('components.post.view.tags')
    @endif
</div>
