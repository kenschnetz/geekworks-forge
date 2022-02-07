<div class="max-w-3xl mx-auto px-4 lg:max-w-7xl">
    <div class="bg-white dark:bg-zinc-700 mt-3 flex p-4 shadow" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div>
                    <a href="{{ route('home') }}" class="text-purple-700 dark:text-purple-500 hover:text-gray-500 p-4">
                        <i class="fas fa-home-alt"></i>
                    </a>
                </div>
            </li>
            @foreach($breadcrumbs as $index => $breadcrumb)
                <li>
                    <i class="fal fa-chevron-left fa-flip-horizontal text-gray-400 dark:text-gray-300"></i>
                </li>
                <li>
                    <div>
                        @if(!$loop->last)
                            <a href="{{ route($breadcrumb['route'], $breadcrumb['route_params'] ?? []) }}" class="text-purple-700 dark:text-purple-500 hover:text-gray-500 p-4 text-sm">
                                {{ $breadcrumb['name'] }}
                            </a>
                        @else
                            <span class="p-4 text-sm dark:text-gray-300">
                                {{ $breadcrumb['name'] }}
                            </span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</div>
