<div class="sticky bottom-0 p-4 text-center lg:text-right">
    <a href="{{ route('messenger') }}" x-on:click="chat_open = true" class="relative bg-purple-700 hover:bg-transparent text-white hover:text-purple-700 font-bold px-4 py-3 border border-purple-700 shadow-lg mr-3">
        <i class="fas fa-comments"></i>
        @if(auth()->user()->unread_global_messages > 0)
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full border border-white">
                {{ auth()->user()->unread_global_messages < 100 ? auth()->user()->unread_global_messages : 99 }}
                @if(auth()->user()->unread_global_messages > 99)
                    <i class="far fa-plus" style="margin-left: 1px"></i>
                @endif
            </span>
        @endif
    </a>
</div>
