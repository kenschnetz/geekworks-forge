<div class="sticky top-4 space-y-4">
    <div class="bg-white shadow py-4">
        <div class="mt-3 px-4">
            <div class="w-full mt-2">
                <div class="flex space-x-3">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ '/storage/img/default-profile.jpg' }}" alt="">
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="mt-1 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
                        <div class="mt-1 bg-gray-100 rounded w-1/3" style="height: 20px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-3"/>
        <div class="mt-3 px-4">
            <div class="mt-1 bg-gray-100 rounded w-full" style="height: 20px;"></div>
        </div>
        <hr class="mt-3"/>
        <div class="mt-3 px-4">
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
            <div class="mt-3 bg-gray-100 rounded w-1/2" style="height: 20px;"></div>
        </div>
        <hr class="mt-3"/>
        <div class="mt-3 px-4">
            <div class="mt-3 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
        </div>
        <hr class="mt-3"/>
        <div class="mt-3 px-4">
            <div class="mt-3 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
        </div>
    </div>
    <div class="bg-white shadow">
        <div class="p-4">
            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                Tags
            </h2>
            <hr class="mt-2" />
            @if(count($tags) > 0)
                <div class="mt-2">
                    @foreach($tags as $post_tag)
                        <span class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-purple-800 text-white border border-purple-800">
                            {{ $post_tag->Tag->name }}
                        </span>
                    @endforeach
                </div>
            @else
                <div class="mt-2">
                    <div class="mt-1 bg-gray-100 rounded w-1/3 inline-block" style="height: 20px;"></div>
                </div>
            @endif
            <div class="mt-1">
                <span class="text-sm italic text-purple-800 cursor-pointer hover:underline" x-data="{}" x-on:click="window.livewire.emitTo('tag-modal', 'Show')">Manage Tags</span>
            </div>
        </div>
    </div>
</div>
