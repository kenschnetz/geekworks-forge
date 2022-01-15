<x-app-layout>
    <div class="min-h-full" x-data="{}" x-cloak>
        @livewire('header')
        <div class="py-5">
            @livewire($view, $properties)
        </div>
    </div>
</x-app-layout>
