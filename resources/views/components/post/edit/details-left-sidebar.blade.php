<div class="sticky top-4 space-y-4">
    <div class="bg-white dark:bg-zinc-700 shadow py-4">
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
    @if($post_type === 'idea')
        @include('components.post.edit.tags')
    @endif
</div>
