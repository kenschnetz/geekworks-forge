<div class="max-w-2xl mx-auto px-4 lg:max-w-7xl">
    <div class="mt-3 overflow-hidden divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-px">
        @foreach($tools as $tool)
            <div class="relative group bg-white dark:bg-zinc-700 p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 md:flex">
                <div>
                    <a href="{{ route($tool->route) }}">
                        <h3 class="text-purple-700 text-lg font-bold text-gray-500 hover:underline cursor-pointer">
                            {{ $tool->name }} <i class="fas fa-caret-right ml-3"></i>
                        </h3>
                    </a>
                    <p class="mt-2 text-sm">
                        {{ $tool->description }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
