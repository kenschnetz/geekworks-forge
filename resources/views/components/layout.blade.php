<x-app-layout>
    <div class="min-h-full">
        @livewire('header')
        <div class="py-5">
            @livewire($view, $properties)
        </div>
    </div>
</x-app-layout>
