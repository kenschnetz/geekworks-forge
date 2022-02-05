<x-app-layout>
    <div class="min-h-full" x-data="{}" x-cloak>
        @livewire('header')
        @if($show_breadcrumbs ?? false)
            @include('components.breadcrumbs')
        @endif
        <div class="mt-3">
            @livewire($view, $properties)
        </div>
        <div class="fixed bottom-0 left-0 w-full p-4 text-center lg:text-right" x-data="{ scrollBackTop: false }" x-cloak>
            <button
                x-show="scrollBackTop"
                x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false"
                x-on:click="window.scrollTo({top: 0, left: 0, behavior: 'smooth'});"
                aria-label="Back to top"
                class="text-white px-4 py-2 bg-orange-600 hover:bg-purple-800 focus:outline-none">
                <i class="fal fa-chevron-double-up fa-2x"></i>
            </button>
        </div>
    </div>
</x-app-layout>
