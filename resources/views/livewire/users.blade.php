<div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
    <div class="lg:col-span-3">
        @include('components.canon.list.left-sidebar')
    </div>
    <main class="lg:col-span-9">
        <div class="mb-3">
            @include('components.list-search')
        </div>
        <div class="bg-white shadow p-4">
            <x-table>
                <x-slot name="head">
                    @foreach($columns as $column)
                        @if($column->sortable)
                            <x-table.heading sortable wire:click="SortBy({{$column->sort_by}})" :direction="$sort_field === $column->sort_by ? $sort_direction : null"><span style="font-size: 14px !important; font-weight: bolder !important;">{{ $column->name }}</span></x-table.heading>
                        @else
                            <x-table.heading class="text-left"><span style="font-size: 14px !important; font-weight: bolder !important;">{{ $column->name }}</span></x-table.heading>
                        @endif
                    @endforeach
{{--                    <x-table.heading sortable wire:click="SortBy('name')" :direction="$sort_field === 'name' ? $sort_direction : null"><span style="font-size: 14px !important; font-weight: bolder !important;">Name</span></x-table.heading>--}}
{{--                    <x-table.heading class="text-left"><span style="font-size: 14px !important; font-weight: bolder !important;">Description</span></x-table.heading>--}}
                </x-slot>
                <x-slot name="body">
                    @foreach($items as $item)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}">
                            @foreach($columns as $column)
                                <x-table.cell>
                                    <a class="block px-6 py-4" href="{{ route('canon', ['id' => $item->id]) }}">
                                        <span class="inline-flex space-x-2 truncate text-sm leading-5">
                                            <p class="text-cool-gray-600">
                                                {{ $item->{$column->key} }}
                                            </p>
                                        </span>
                                    </a>
                                </x-table.cell>
                            @endforeach
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
            @if ($items->hasPages())
                <hr class="my-3" />
                {{ $items->links() }}
            @endif
        </div>
    </main>
</div>
