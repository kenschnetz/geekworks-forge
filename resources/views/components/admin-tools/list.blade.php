<div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
    <div class="lg:col-span-3">
        @include('components.admin-tools.list-left-sidebar')
    </div>
    <main class="lg:col-span-9">
        @if((isset($prevent_search) && !$prevent_search) || !isset($prevent_search))
            <div class="mb-3">
                @include('components.list-search')
            </div>
        @endif
        <div class="bg-white dark:bg-zinc-700 dark:text-gray-300 shadow p-4">
            @if($items->count() > 0)
                @include('components.dynamic-table')
            @else
                No {{ Str::plural($item_name) }} found
            @endif
        </div>
    </main>
</div>
