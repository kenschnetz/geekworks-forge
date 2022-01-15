<div class="flex-shrink-0">
    <a href="{{ route('user-profile', ['user_id' => $author['id']]) }}">
        <img class="h-10 w-10 rounded-full" src="{{ ($author['character']['profile_photo']['path']) ?? '/storage/img/default-profile.jpg' }}" alt="">
    </a>
</div>
<div class="min-w-0 flex-1">
    <p class="text-sm font-medium text-gray-900">
        <a href="{{ route('user-profile', ['user_id' => ($author['id'])]) }}" class="hover:underline font-medium text-purple-700">{{ $author['character']['name'] }}</a>
    </p>
    <p class="text-sm text-gray-500">
        Level {{ $author['character']['level'] }}
    </p>
</div>
