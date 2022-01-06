<div class="flex-shrink-0">
    <a href="{{ route('user-profile', ['user_id' => $user->id ?? $post->User->id]) }}">
        <img class="h-10 w-10 rounded-full" src="{{ ($user->Character->ProfilePhoto->path ?? $post->User->Character->ProfilePhoto->path) ?? '/storage/image/default-profile.jpg' }}" alt="">
    </a>
</div>
<div class="min-w-0 flex-1">
    <p class="text-sm font-medium text-gray-900">
        <a href="{{ route('user-profile', ['user_id' => ($user->id ?? $post->User->id)]) }}" class="hover:underline font-medium text-purple-700">{{ $user->Character->name ?? $post->User->Character->name }}</a>
    </p>
    <p class="text-sm text-gray-500">
        Level {{ $user->Character->level ?? $post->User->Character->level }}
    </p>
</div>
