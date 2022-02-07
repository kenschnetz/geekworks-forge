<div class="flex space-x-3 items-center">
    @if(!empty($author))
        <div class="flex-shrink-0">
            <a href="{{ route('user-profile', ['user_name' => Str::lower($author->Character->name)]) }}">
                <img class="h-10 w-10 rounded-full" src="{{ $author->Character->ProfilePhoto->path ?? '/storage/img/default-profile.jpg' }}" alt="">
            </a>
        </div>
        <div class="min-w-0 flex-1 justify-center items-center">
            <a href="{{ route('user-profile', ['user_name' => $author->Character->name]) }}" class="hover:underline text-sm font-medium text-purple-700 dark:text-purple-500">{{ $author->Character->name }}</a>
            @if($author->IsStaff())
                <i class="fas fa-crown text-purple-500"></i>
            @elseif($author->IsAdmin())
                <i class="fas fa-shield text-purple-500"></i>
            @elseif($author->IsTester())
                <i class="fas fa-vial text-purple-500"></i>
            @endif
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
