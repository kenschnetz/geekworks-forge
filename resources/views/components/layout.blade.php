<x-app-layout>
    <div class="min-h-full" x-data="{}" x-cloak>
        @livewire('header')
        @if($show_breadcrumbs ?? false)
            @include('components.breadcrumbs')
        @endif
        <div class="mt-3">
            @livewire($view, $properties)
        </div>
    </div>
</x-app-layout>
