<div class="bg-white dark:bg-zinc-700 shadow">
    <div class="p-4">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Tags
        </h2>
        <hr class="mt-2" />
        @if(count($tags) > 0)
            <div class="mt-2">
                @foreach($tags as $post_tag)
                    <span class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-purple-700 text-white border border-purple-700">
                        {{ $post_tag['name'] }}
                    </span>
                @endforeach
            </div>
        @else
            <div class="mt-2">
                <div class="mt-1 bg-gray-100 rounded w-1/3 inline-block" style="height: 20px;"></div>
            </div>
        @endif
        @error('tags')<div class="mt-1"><span class="text-red-600 error italic mt-3">{{ $message }}</span></div>@enderror
        @if(!$is_collaboration)
            <div class="mt-1">
                <span class="text-sm italic text-purple-700 cursor-pointer hover:underline" x-data="{}" x-on:click="window.livewire.emitTo('tag-post-meta-modal', 'Show')">Manage Tags</span>
            </div>
        @endif
    </div>
</div>
