<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex items-center mt-4">
        <a href="{{route('brand')}}" style="margin-left: auto !important;">
            <x-button >
                {{ __('New') }}
            </x-button>
        </a>
    </div>
    <hr class="mt-4"/>
    <x-table>
        <x-slot name="head">
            <x-table.heading sortable wire:click="SortBy('name')" :direction="$sort_field === 'name' ? $sort_direction : null"><span style="font-size: 14px !important; font-weight: bolder !important;">Name</span></x-table.heading>
        </x-slot>
        <x-slot name="body">
            @foreach($brands as $brand)
                <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $brand->id }}" wire:click="Edit({{$brand->id}})">
                    <x-table.cell>
                        <span href="#" class="inline-flex space-x-2 truncate text-sm leading-5">
                            <p class="text-cool-gray-600">
                                {{ $brand->name }}
                            </p>
                        </span>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
    @if(count($brands) <= 0)
        <div class="mt-4">
            <span class="font-medium">No Brands found... why not <a class="link" href="{{route('brand')}}" style="margin-left: auto !important;">add one</a>?</span>
        </div>
    @endif
</div>
