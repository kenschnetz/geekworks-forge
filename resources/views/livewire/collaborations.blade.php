<div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
    <div class="lg:col-span-3">
        @include('components.collaboration.list.left-sidebar')
    </div>
    <main class="lg:col-span-9">
        <div class="bg-white dark:bg-zinc-700 shadow p-4">
            @include('components.dynamic-table')
        </div>
    </div>
</div>
