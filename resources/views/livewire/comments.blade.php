<div class="max-w-3xl mx-auto lg:max-w-7xl">
    <div class="bg-white dark:bg-zinc-700 px-4 py-6 shadow sm:p-6">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Leave A Comment
        </h2>
        <div class="mt-3">
            <x-dynamic-input :limit="0" :key="'new_comment_content'" :placeholder="'Say something inspirational!'" class="flex items-center">
                {{ $new_comment_content }}
                <x-slot name="post">
                    <i class="ml-auto pl-3 fas fa-share-square text-gray-200 hover:text-purple-700 cursor-pointer" x-on:click="$wire.SubmitNewComment()" style="font-size: 1.5em !important;"></i>
                </x-slot>
            </x-dynamic-input>
            @error('new_comment_content') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
        </div>
        @error('reply_comment_content') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
        <hr class="my-3"/>
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Recent Comments
        </h2>
        @if($post->Comments->count() > 0)
            @foreach($comments as $comment)
                @include('components.comment')
            @endforeach
            {{ $comments->links() }}
        @else
            <div>
                <p class="font-semibold text-gray-900 my-3">
                    No comments yet. You should be the first to leave one!
                </p>
            </div>
        @endif
    </div>
</div>
