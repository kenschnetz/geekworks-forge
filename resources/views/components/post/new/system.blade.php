<div class="mt-12">
    <h2 class="text-gray-500 font-bold uppercase tracking-wide text-center">Step 2. What system does your {{ match($post->post_type_id) { 1 => 'Idea', 2 => 'Question', 3 => 'Article' } }} belong to?</h2>
    {{--TODO: add searchbar here for filtering systems--}}
    <div class="mt-12 rounded-lg overflow-hidden divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-3 sm:gap-px">
        @foreach ($systems as $system)
            <div class="md:col-span-1 relative group bg-white dark:bg-zinc-700 p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 md:flex">
                <div>
                    <h3 class="text-purple-700 text-lg font-bold text-gray-500 hover:underline cursor-pointer" wire:click="ChooseSystem({{ $system->id }}, '{{ $system->name }}')">
                        {{ $system->name }} <i class="fas fa-caret-right ml-3"></i>
                    </h3>
                    <p class="mt-2 text-sm">
                        {{ $system->description }}.
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-3">
        {{ $systems->links() }}
    </div>
</div>
