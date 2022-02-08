<x-app-layout>
    <div class="min-h-full" x-data="{}" x-cloak>
        @livewire('header')
        @if($show_breadcrumbs ?? false)
            @include('components.breadcrumbs')
        @endif
        <div class="mt-3">
            @livewire($view, $properties)
        </div>
        <div class="w-24 mx-auto lg:ml-auto lg:mr-0 fixed inset-x-0 bottom-0 lg:right-0 p-4" x-data="{ scrollBackTop: false }" x-cloak>
            <button
                x-show="scrollBackTop"
                x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false"
                x-on:click="window.scrollTo({top: 0, left: 0, behavior: 'smooth'});"
                aria-label="Back to top"
                class="text-white px-4 py-1 bg-orange-600 hover:bg-purple-700 focus:outline-none">
                <i class="fal fa-angle-double-up fa-2x"></i>
            </button>
        </div>
    </div>
</x-app-layout>
