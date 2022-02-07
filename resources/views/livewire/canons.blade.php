<div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
    <div class="lg:col-span-3">
        @include('components.canon.list.left-sidebar')
    </div>
    <div class="block lg:hidden">
        @include('components.canon.list.right-sidebar')
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
                    @foreach($canons as $canon)
                            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $canon->id }}">
                                <x-table.cell>
                                    <a class="block px-6 py-4" href="{{ route('canon', ['slug' => $canon->slug]) }}">
                                        <span class="inline-flex space-x-2 truncate text-sm leading-5">
                                            <p class="text-cool-gray-600 dark:text-gray-300">
                                                {{ $canon->name }}
                                            </p>
                                        </span>
                                    </a>
                                </x-table.cell>
                            </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
            @if ($canons->hasPages())
                <hr class="my-3" />
                {{ $canons->links() }}
            @endif
            @if(count($canons) <= 0)
                <hr class="my-3" />
                <div class="mt-3">
                    <span class="font-medium dark:text-gray-300">
                        @if(auth()->user()->id === $user->id)
                            No Canons found... why not <a class="text-orange-600 hover:underline" href="{{route('canon')}}">create one</a>?
                        @else
                            <a class="text-purple-700 dark:text-purple-500" href="{{ route('user-profile', ['user_name' => $user->Character->name]) }}">{{ $user->Character->name }}</a> has no public Canons!
                        @endif
                    </span>
                </div>
            @endif
        </div>
    </main>
    <div class="hidden lg:block lg:col-span-3">
        @include('components.canon.list.right-sidebar')
    </div>
</div>
