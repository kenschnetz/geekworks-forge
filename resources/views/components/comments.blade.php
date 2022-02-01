<div>
    <div class="mt-3 bg-white dark:bg-zinc-700 px-4 py-6 shadow sm:p-6">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Leave A Comment
        </h2>
        <hr class="my-3"/>
        @if($replying)
            <div class="mb-4">
                <div class="p-2 bg-purple-800 items-center text-purple-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="font-semibold mr-2 text-left flex-auto">Replying to {{$replying_to_name}}: "<i>{{$replying_to_comment}}</i>"</span>
                    <i class="ml-3 far fa-times-circle cursor-pointer" wire:click="ClearCommentForm()"></i>
                </div>
            </div>
        @endif
        @if($editing)
            <div class="mb-4">
                <div class="p-2 bg-purple-800 items-center text-purple-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="font-semibold mr-2 text-left flex-auto">Editing</span>
                    <i class="ml-3 far fa-times-circle cursor-pointer" wire:click="ClearCommentForm()"></i>
                </div>
            </div>
        @endif
        <form id="comment-form" wire:submit.prevent="SubmitComment">
            @csrf
            <div class="mt-3" x-data="{ comment_content: @entangle('comment_content') }">
                <div class="px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800" x-on:blur="comment_content = $el.textContent" contenteditable placeholder="Enter comment">{{ $comment_content }}</div>
            </div>
            <div class="mt-1 text-right">
                <button type="submit" class="mt-1 bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800">
                    Submit
                </button>
            </div>
        </form>
        <hr class="my-3"/>
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Recent Comments
        </h2>
        @if(count($comments) > 0)
            @foreach($comments as $comment)
                @include('components.comment')
                <hr class="my-3"/>
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
