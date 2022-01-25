<x-table>
    <x-slot name="head">
        @foreach($columns as $column)
            @if($column->sortable)
                <x-table.heading sortable wire:click="SortBy('{{$column->sort_by}}')" :direction="$sort_field === $column->sort_by ? $sort_direction : null"><span style="font-size: 14px !important; font-weight: bolder !important;">{{ $column->name }}</span></x-table.heading>
            @else
                <x-table.heading class="text-left"><span style="font-size: 14px !important; font-weight: bolder !important;">{{ $column->name }}</span></x-table.heading>
            @endif
        @endforeach
    </x-slot>
    <x-slot name="body">
        @foreach($items as $item)
            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}">
                @foreach($columns as $column)
                    <x-table.cell>
                        <a class="block px-6 py-4" href="{{ route($route ?? $column->route, ['id' => $item->id]) }}">
                            <span class="inline-flex space-x-2 truncate text-sm leading-5">
                                <p class="text-cool-gray-600">
                                    @if(isset($column->limit_word_count) && $column->limit_word_count > 0)
                                        {{ Str::limit($item->{$column->key}, $column->limit_word_count) }}
                                    @else
                                        {{ $item->{$column->key} }}
                                    @endif
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
