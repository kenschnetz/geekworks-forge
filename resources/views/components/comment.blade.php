<div wire:key="{{$comment->id}}" class="mt-3">
    <div x-data="{ replying: false, editing: false, deleting: false}">
        <div class="block">
            <div class="flex justify-center items-center space-x-2 relative">
                <div class="bg-gray-50 border w-full p-4">
                    <span class="absolute top-3 right-3 text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                    @include('components.author', ['author' => $comment->User])
                    <div x-show="!editing" class="mt-3">
                        {{ $comment->comment }}
                    </div>
                    <div x-show="editing" class="mt-3">
                        <x-dynamic-input :limit="0" :key="'edit_comment_content'" :placeholder="'Edit comment'" class="flex items-center">
                            <x-slot name="pre">
                                <i class="fas fa-ban text-gray-200 hover:text-purple-700 cursor-pointer mr-3" style="font-size: 1.5em !important;" x-on:click="editing = false, $wire.set('edit_comment_content', '')"></i>
                            </x-slot>
                            {{ $edit_comment_content }}
                            <x-slot name="post">
                                <i class="ml-auto pl-3 fas fa-share-square text-gray-200 hover:text-purple-700 cursor-pointer" x-on:click="$wire.SubmitEdit().then(result => { editing = result })" style="font-size: 1.5em !important;"></i>
                            </x-slot>
                        </x-dynamic-input>
                    </div>
                </div>
            </div>
            <div class="flex justify-start items-center text-sm text-gray-400 my-1">
                @if($comment->User->id !== $user->id)
                    @if($comment->upvoted)
                        <span class="hover:underline mr-3 cursor-pointer" x-show="!deleting && !replying && !editing" wire:click="RemoveUpvote({{$comment->id}})">
                            Remove Upvote
                        </span>
                    @else
                        <span class="hover:underline mr-3 cursor-pointer" x-show="!deleting && !replying && !editing" wire:click="Upvote({{$comment->id}})">
                            Upvote
                        </span>
                    @endif
                @endif
                @if($comment->User->id === $user->id)
                    <span class="hover:underline mr-3 cursor-pointer" x-show="!deleting && !editing && !replying" x-on:click="$wire.set('editing_id', {{$comment->id}}), $wire.set('edit_comment_content', '{{$comment->comment}}'), editing = true">
                        Edit
                    </span>
                @elseif(empty($comment->comment_id))
                    <span class="hover:underline mr-3 cursor-pointer" x-show="!deleting && !editing && !replying" x-on:click="$wire.set('replying_to_id', {{$comment->id}}), replying = true">
                        Reply
                    </span>
                @endif
                @if($comment->User->id === $user->id || ($user->IsStaff() || $user->IsAdmin()))
                    <span class="hover:underline mr-3 cursor-pointer" x-show="!deleting && !editing && !replying" x-on:click="deleting = true" @click.away="deleting = false">
                        Delete
                    </span>
                    <span class="hover:underline mr-3 cursor-pointer" x-show="deleting" x-on:click="deleting = false" @click.away="deleting = false">
                        Cancel
                    </span>
                    <span class="hover:underline mr-3 cursor-pointer text-red-600" x-show="deleting" wire:click="DeleteComment({{$comment->id}})" @click.away="deleting = false">
                        Confirm Delete
                    </span>
                @endif
                <div class="ml-auto inline-block flex items-center space-x-2 text-sm text-gray-300 font-semi-bold">
                    <i class="fas fa-thumbs-up mr-1 text-xs"></i>
                    <span>{{ App\Utilities\Number::Shorten($comment->upvotes_count) }}</span>
                </div>
            </div>
            <div class="ml-8">
                <div x-show="replying" class="bg-gray-50 border w-full p-4 mt-3">
                    <x-dynamic-input :limit="0" :key="'reply_comment_content'" :placeholder="'Reply'" class="flex items-center">
                        <x-slot name="pre">
                            <i class="fas fa-ban text-gray-200 hover:text-purple-700 cursor-pointer mr-3" style="font-size: 1.5em !important;" x-on:click="replying = false, $wire.set('reply_comment_content', '')"></i>
                        </x-slot>
                        {{ $reply_comment_content }}
                        <x-slot name="post">
                            <i class="ml-auto pl-3 fas fa-share-square text-gray-200 hover:text-purple-700 cursor-pointer" x-on:click="$wire.SubmitReply().then(result => { replying = $wire.get('replying') })" style="font-size: 1.5em !important;"></i>
                        </x-slot>
                    </x-dynamic-input>
                    @error('reply_comment_content') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                </div>
                @foreach($comment->Comments as $reply)
                    @include('components.comment', ['comment' => $reply])
                @endforeach
            </div>
        </div>
    </div>
</div>
{{--<div wire:key="{{$comment->id}}" class="m-2 p-2 border-b border-l">--}}
{{--    <div class="w-full" x-data="{ replying: false, editing: false, deleting: false}">--}}
{{--        <div class="mt-3">--}}
{{--            <span class="inline-block text-xs float-right">{{ $comment->created_at->diffForHumans() }}</span>--}}
{{--            @include('components.author', ['author' => $comment->User])--}}
{{--        </div>--}}
{{--        <div class="mt-3">--}}
{{--            {{ $comment->comment }}--}}
{{--        </div>--}}
{{--        <div class="mt-3">--}}
{{--            <span x-show="!replying" x-on:click="replying = true, $wire.set('replying_to_id', {{$comment->id}})" @click.away="replying = false" class="inline-block text-xs align-bottom cursor-pointer text-purple-700"><i>Reply</i></span>--}}
{{--            @if($user->IsStaff() || $user->IsAdmin())--}}
{{--                <span x-show="!deleting && !replying" x-on:click="deleting = true" @click.away="deleting = false" class="inline-block text-xs align-bottom cursor-pointer text-red-600 float-right"><i>Delete</i></span>--}}
{{--                <span x-show="deleting" wire:click="DeleteComment({{$comment->id}})" @click.away="deleting = false" class="inline-block text-xs align-bottom cursor-pointer text-red-600 float-right"><i>Confirm</i></span>--}}
{{--                <span x-show="deleting" x-on:click="deleting = false" @click.away="deleting = false" class="inline-block text-xs align-bottom cursor-pointer text-green-600 float-right mr-3"><i>Cancel</i></span>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div x-show="replying" class="mt-3">--}}
{{--            <x-dynamic-input :limit="0" :key="'reply_comment'" :placeholder="'Reply'" class="flex items-center">--}}
{{--                <x-slot name="pre">--}}
{{--                    <i class="fas fa-ban text-gray-200 hover:text-purple-700 cursor-pointer mr-3" style="font-size: 1.5em !important;" x-on:click="replying = false, $wire.set('reply_comment', '')"></i>--}}
{{--                </x-slot>--}}
{{--                {{ $reply_comment }}--}}
{{--                <x-slot name="post">--}}
{{--                    <i class="ml-auto pl-3 fas fa-share-square text-gray-200 hover:text-purple-700 cursor-pointer" x-on:click="$wire.SubmitReply().then(result => { replying = result })" style="font-size: 1.5em !important;"></i>--}}
{{--                </x-slot>--}}
{{--            </x-dynamic-input>--}}
{{--            @error('reply_content') <span class="text-red-600 error italic">{{ $message }}</span> @enderror--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
