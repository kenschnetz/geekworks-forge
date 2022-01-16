<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    @if ($delete)
        @include('components.delete.form')
    @else
        @if (!empty($brand_id))
            @include('components.delete.button')
        @endif
        <form wire:submit.prevent="Submit">
            <div class="mt-4 w-full">
                <x-label for="name" value="{{ __('Name') }}"></x-label>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="brand.name"></x-input>
                @error('brand.name') <span class="text-red-500">{{ $required_message }}</span> @enderror
            </div>
            <div class="mt-4 w-full">
                <x-label for="description" value="{{ __('Description') }}"></x-label>
                <x-input id="description" class="block mt-1 w-full" type="text" name="description" wire:model="brand.description"></x-input>
                @error('brand.description') <span class="text-red-500">{{ $required_message }}</span> @enderror
            </div>
            <hr class="mt-4"/>
            <div class="flex items-center mt-4">
                <x-nav-link href="{{ route('brands') }}">
                    Back
                </x-nav-link>
                <x-button style="margin-left: auto !important;">
                    {{ empty($brand_id) ? __('Create') : __('Update') }}
                </x-button>
            </div>
        </form>
    @endif
</div>
