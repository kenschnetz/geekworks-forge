<div class="lg:col-span-4 mb-3">
    <div class="sticky top-4 space-y-1">
        <div class="bg-white dark:bg-zinc-700 shadow px-4 py-6 space-y-1">
            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                Threads
            </h2>
            <hr class="mt-3" />
            @if($messenger_threads->count() <= 0)
                <p class="py-2 text-gray-400">
                    No message threads found
                </p>
            @else
                <div class="divide-y divide-gray-100">
                    @foreach($messenger_threads as $messenger_thread)
                        <a href="{{ route('messenger', ['action' => 'thread', 'actionable_id' => $messenger_thread->id]) }}" @class(['text-gray-900 group flex items-center py-2 px-3 cursor-pointer hover:bg-gray-200', 'bg-gray-200' => ($messenger_thread->id === optional($selected_thread)->id)])>
                            <span class="font-medium text-gray-500 tracking-wider align-middle" style="margin-top: 2px !important;">
                                {{ $messenger_thread->name }}
                            </span>
                            @if($messenger_thread->notifications_sum_count > 0)
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full ml-auto">
                                    {{ $messenger_thread->notifications_sum_count }}
                                </span>
                            @endif
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
