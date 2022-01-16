<div class="flex space-x-3">
    @if(!empty($author))
        <div class="flex-shrink-0">
            <a href="{{ route('user-profile', ['user_name' => Str::lower($author->Character->name)]) }}">
                <img class="h-10 w-10 rounded-full" src="{{ $author->Character->ProfilePhoto->path ?? '/storage/img/default-profile.jpg' }}" alt="">
            </a>
        </div>
        <div class="min-w-0 flex-1">
            <p class="text-sm font-medium text-gray-900">
                <a href="{{ route('user-profile', ['user_name' => Str::lower($author->Character->name)]) }}" class="hover:underline font-medium text-purple-700">{{ $author->Character->name }}</a>
            </p>
            <p class="text-sm text-gray-500">
                Level {{ $author->Character->level }}
            </p>
        </div>
    @else
        <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="{{ '/storage/img/default-profile.jpg' }}" alt="">
        </div>
        <div class="min-w-0 flex-1">
            <div class="mt-1 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
            <div class="mt-1 bg-gray-100 rounded w-1/3" style="height: 20px;"></div>
        </div>
    @endif
</div>
