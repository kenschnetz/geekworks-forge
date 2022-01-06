<div id="comment-{{$comment->id}}">
    <div class="my-3">
        <strong>{{$comment->User->name}}</strong> says:
        <span class="inline-block float-right text-xs">{{ $comment->created_at->diffForHumans() }}</span>
    </div>
    <div class="my-3">
        {{$comment->comment}}
    </div>
    <div class="py-3" x-data="{ deleting: false }" x-cloak>
        @auth
            @if($user->id === $comment->user_id)
                <a class="inline-block text-xs align-bottom cursor-pointer text-blue-600" wire:click="EditComment({{$comment->id}}, '{{$comment->comment}}')"><i>Edit</i></a>
                @include('components.post.comment.delete')
            @else
                <a href="#comments" class="inline-block text-xs align-bottom cursor-pointer text-blue-600" wire:click="ReplyTo({{$comment->id}}, '{{$comment->User->name}}', '{{Str::limit($comment->comment, 200)}}')"><i>Reply</i></a>
                @if($user->IsStaff() || $user->IsAdmin())
                    @include('components.post.comment.delete')
                @endif
            @endif
        @endauth
    </div>
    @foreach($comment->Comments as $comment)
        <div class="ml-3 pl-3 border-l border-t" wire:key="{{$comment->id}}-reply-{{$loop->index}}">
            @include('components.comment')
        </div>
    @endforeach
</div>
