<div class="bg-white shadow mb-3">
    <div class="p-4">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Filters
        </h2>
        <hr class="my-3" />
        @foreach($filters as $filter)
            <span class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-orange-600 text-white">
                {{ $filter }}
            </span>
        @endforeach
    </div>
</div>
