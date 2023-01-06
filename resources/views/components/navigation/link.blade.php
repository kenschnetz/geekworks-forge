@props(['active', 'icon', 'route'])

<a href="{{ route($route) }}" @class(['justify-center lg:justify-start group rounded-md leading-5 text-lg uppercase flex items-center p-2', 'text-black font-bold' => $active, 'text-gray-600 hover:bg-gray-100' => !$active])>
    <div class="inline-flex items-center justify-center h-8 w-8 lg:mr-3">
        <i @class(['fa-lg', 'fa-solid' => $active, 'fa-light' => !$active, $icon])></i>
    </div>
    <span class="hidden lg:block">{{ $slot }}</span>
</a>
