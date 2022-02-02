<div class="px-6" wire:poll>
    <ul role="list">
        <li>
            <div class="relative pb-10">
                <span class="absolute top-0 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
            </div>
        </li>
        @foreach($selected_thread->Messages()->latest()->limit($current_pagination_count)->get() as $index => $message)
            @if(!empty($message))
                <li>
                    <div class="relative pb-4">
                        @if(!$loop->last || ($loop->last && !$all_messages_loaded))
                            <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        @endif
                        <div class="relative flex items-start space-x-3">
                            <div class="relative">
                                <a href="{{ route('user-profile', ['user_name' => $message->User->Character->user_name]) }}">
                                    <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center border border-2 border-white" src="{{ ($message->User->Character->ProfilePhoto->path ?? '/storage/img/default-profile.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="min-w-0 flex-1 ml-2 pl-2">
                                <div>
                                    <div class="text-sm">
                                        <a href="{{ route('user-profile', ['user_name' => $message->User->Character->user_name]) }}" class="font-medium text-gray-900">{{ $message->User->Character->name ?? 'User#' . $message->User->id }}</a>
                                    </div>
                                    <p class="text-sm text-gray-500">
                                        {{ $message->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="mt-2 text-sm text-gray-700">
                                    <p>
                                        {{ $message->message }}
                                    </p>
                                </div>
                                @if(!$loop->last)
                                    <hr class="mt-4" />
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endif
        @endforeach
        @if(!$all_messages_loaded)
            <li x-intersect.full="$wire.loadMoreMessages">
                <div class="relative pb-8">
                    <div class="relative flex items-start space-x-3">
                        <div class="relative">
                            <img class="mt-2 h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center border border-2 border-white" src="{{ '/storage/img/default-profile.jpg' }}" alt="">
                        </div>
                        <div class="min-w-0 flex-1 ml-2 pl-2">
                            <div>
                                <div class="animate-pulse bg-gray-200 rounded" style="height: 20px; width: 200px;"></div>
                                <div class="mt-1 animate-pulse bg-gray-200 rounded" style="height: 20px; width: 120px;"></div>
                            </div>
                            <div class="mt-1 animate-pulse bg-gray-200 rounded w-1/2" style="height: 20px;"></div>
                        </div>
                    </div>
                </div>
            </li>
        @endif
    </ul>
</div>
