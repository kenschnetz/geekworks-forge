<x-layout.editable.left-sidebar.above-on-mobile :editing="$editing">
    <x-slot name="edit_buttons">
        @if(empty($this->item->id))
            <a href="{{route('collections')}}">
                <button class="bg-gray-400 hover:bg-transparent text-white hover:text-gray-400 font-bold px-4 py-3 border border-gray-600" style="width:140px">
                    Cancel
                </button>
            </a>
        @else
            <button wire:click="ToggleEditing()" class="bg-gray-400 hover:bg-transparent text-white hover:text-gray-400 font-bold px-4 py-3 border border-gray-600" style="width:140px">
                Cancel
            </button>
        @endif
        <button wire:click="Save()" class="bg-orange-500 hover:bg-transparent text-white hover:text-orange-500 font-bold px-4 py-3 border border-orange-500" style="width:140px">
            Save
        </button>
    </x-slot>
    <x-slot name="left_sidebar">
        @include('components.collection.view.left-sidebar')
    </x-slot>
    <div class="bg-white dark:bg-zinc-700 p-4 shadow" x-data="{ name: @entangle('item.name'), description: @entangle('item.description'), limit: 255 }" x-cloak>
        @if($editing)
            <div class="flex space-x-3">
                <div class="min-w-0 flex-1">
                    <x-dynamic-input :key="'item.name'" :placeholder="'Collection name'">{{ $item->name }}</x-dynamic-input>
                    @error('item.name') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                </div>
            </div>
            <hr class="mt-3"/>
            <div class="mt-3 flex space-x-3">
                <div class="min-w-0 flex-1">
{{--                    <x-dynamic-input :limit="0" :key="'item.description'" :placeholder="'Collection description'">{{ $item->description }}</x-dynamic-input>--}}
                    <div class="mt-3 space-y-4" wire:ignore>
                        <trix-editor class="trix-editor" x-data x-on:trix-change="$dispatch('input', event.target.value)" wire:model.debounce.1000ms="item.description" wire:key="post-rich-editor"></trix-editor>
                    </div>
                    @error('item.description') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                </div>
            </div>
            <hr class="mt-3"/>
            <div class="mt-3 w-full">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="item.publicly_visible" type="checkbox" name="public" id="public" class="text-purple-700 focus:ring-purple-700 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white dark:bg-zinc-700 border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Publicly visible (anyone can view)
                </div>
            </div>
        @else
            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                {{ $item->name }}
            </h2>
            <hr class="mt-3"/>
            <div class="mt-3">
                {!! $item->description !!}
            </div>
        @endif
    </div>
    @if(optional($posts)->count() > 0 ?? false)
        <div class="mt-3 bg-white dark:bg-zinc-700 p-4 shadow">
            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                Posts
            </h2>
            <hr class="mt-3"/>
            <div class="mt-3">
                @include('components.post.list.simple')
            </div>
        </div>
        <div class="mt-3">
            {{ $posts->Links() }}
        </div>
    @endif
    <x-slot name="right_sidebar">
        @include('components.collection.view.right-sidebar')
    </x-slot>
{{--TODO: change left sidebar to have a link back to collections and a delete button--}}
</x-layout.editable.left-sidebar.above-on-mobile>
