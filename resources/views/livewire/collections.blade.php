<div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
    <div class="lg:col-span-3">
        @include('components.collection.list.left-sidebar')
    </div>
    <div class="block lg:hidden">
        @include('components.collection.list.right-sidebar')
    </div>
    <main class="lg:col-span-6">
        <div class="mb-3">
            @include('components.list-search')
        </div>
        <div class="bg-white dark:bg-zinc-700 shadow p-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable wire:click="SortBy('name')" :direction="$sort_field === 'name' ? $sort_direction : null"><span style="font-size: 14px !important; font-weight: bolder !important;">Name</span></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @foreach($collections as $collection)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $collection->id }}">
                            <x-table.cell>
                                <a class="block px-6 py-4" href="{{ route('collection', ['slug' => $collection->slug]) }}">
                                    <span class="inline-flex space-x-2 truncate text-sm leading-5">
                                        <p class="text-cool-gray-600">
                                            {{ $collection->name }}
                                        </p>
                                    </span>
                                </a>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
            @if ($collections->hasPages())
                <hr class="my-3" />
                {{ $collections->links() }}
            @endif
            @if(count($collections) <= 0)
                <hr class="my-3" />
                <div class="mt-3">
                    <span class="font-medium">
                        @if(auth()->user()->id === $user->id)
                            No Collections found... why not <a class="text-orange-600 hover:underline" href="{{route('collection')}}">create one</a>?
                        @else
                            <a class="text-purple-800" href="{{ route('user-profile', ['user_name' => $user->Character->name]) }}">{{ $user->Character->name }}</a> has no public Collections!
                        @endif
                    </span>
                </div>
            @endif
        </div>
    </main>
    <div class="hidden lg:block lg:col-span-3">
        @include('components.collection.list.right-sidebar')
    </div>
</div>
