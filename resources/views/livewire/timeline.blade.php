<x-app-layout>
    <x-slot:title>
        Latest Posts
    </x-slot>
    <div class="md:px-2">
        <ul role="list" class="divide-y divide-gray-200">
            @include('components.timeline.post-preview')
            @include('components.timeline.post-preview')
            @include('components.timeline.post-preview')
        </ul>
    </div>
</x-app-layout>
