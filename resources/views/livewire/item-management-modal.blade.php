<div class="absolute top-0 left-0" x-data="{ tooltip: 'Hover or click an item to see it\'s description', default_tooltip: 'Hover or click an item to see it\'s description' }">
    <x-modal wire:model="show">
        <div class="my-3 px-4 sm:px-0">
            <p class="text-xl font-bold">{{ $title }}</p>
        </div>
        <hr class="my-3" />
        <div x-data="{ tab: @entangle('tab') }" id="tab-wrapper" x-cloak>
            <nav class="bg-gray-100">
                <a :class="{ 'bg-white border border-b-0': tab === 0 }" class="inline-block p-4 text-center rounded-tr-lg" style="min-width: 100px !important;" @click.prevent="tab = 0" href="#">List</a>
                <a :class="{ 'bg-white border border-b-0': tab === 1 }" class="inline-block p-4 text-center rounded-tl-lg rounded-tr-lg" style="min-width: 100px !important;" @click.prevent="tab = 1" href="#">Add</a>
            </nav>
            <div x-show="tab === 0" class="p-3 border -mt-px">
                <div class="flex items-center">
                    <input wire:model="search_term" class="w-full rounded py-4 px-6 text-gray-700 leading-tight focus:outline-none" id="item-search" type="text" placeholder="Filter" wire:model.lazy="search_term">
                </div>
                <hr class="my-3" />
                <div class="bg-purple-800 p-1 text-white text-sm" x-text="tooltip"></div>
                <div @class(['mt-3 gap-1', 'grid grid-cols-2 md:grid-cols-4' => !$managing_images, 'w-full md:grid md:grid-cols-3' => $managing_images])>
                    @foreach($items as $index => $item)
                        <div wire:click="ToggleItem({{$item}})" class="cursor-pointer p-3 text-center font-bold {{ empty($selected_items[$item->id]) ? 'border' : 'border-2 border-orange-600' }}" wire:key="{{$index}}" x-on:mouseover="tooltip = $el.dataset.tooltip" x-on:mouseleave="tooltip = default_tooltip" data-tooltip="{{ $item->description }}">
                            @if($managing_images)
                                <div class="w-full">
                                    <div style="width: 100%; margin: 0 auto; padding-bottom: 100%; background-image: url('{{$item->path}}'); background-size: cover; background-position: center center"></div>
                                </div>
                                {{ $item->id }}
                            @else
                                {{ $item->name }}
                            @endif
                        </div>
                    @endforeach
                </div>
                @if ($items->hasPages())
                    <hr class="my-3" />
                @endif
                {{ $items->links() }}
            </div>
            <div x-show="tab === 1" class="p-3 border -mt-px">
                <form class="w-full" id="new-item-form" wire:submit.prevent="CreateItem()" x-data="{ isUploading: false, progress: 0 }">
                    @csrf
                    <div x-on:livewire-upload-start="isUploading = true; progress = 0;" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" class="w-full p-3 flex">
                        <input class="appearance-none bg-transparent border-gray-200 w-full text-gray-700 mr-3 p-2 leading-tight focus:outline-none" type="file" wire:model="uploaded_file">
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                    @error('uploaded_file')<p class="my-3 italic text-red-700">{{ $message }}</p>@enderror
                    @error('new_item.filepath')<p class="my-3 italic text-red-700">{{ $message }}</p>@enderror
                    <div class="w-full p-3">
                        <div class="flex space-x-3">
                            <div class="min-w-0 flex-1">
                                <div x-data="{name: @entangle('new_item.name'), limit: 255 }">
                                    <div class="border border-purple-800 focus:border-purple-800">
                                        <span x-show="name?.length > 0" class="text-xs italic p-1 float-right" x-text="limit - name?.length" :class="{'text-gray-400':  name?.length <= limit, 'text-red-500':  name?.length > limit }"></span>
                                        <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="name = $el.textContent" contenteditable placeholder="Name" wire:ignore>{{ $new_item->name }}</div>
                                    </div>
                                    @error('new_item.name') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 flex space-x-3">
                            <div class="min-w-0 flex-1">
                                <div x-data="{description: @entangle('new_item.description'), limit: 255 }">
                                    <div class="border border-purple-800 focus:border-purple-800">
                                        <span x-show="description?.length > 0" class="text-xs italic p-1 float-right" x-text="limit - description?.length" :class="{'text-gray-400':  description?.length <= limit, 'text-red-500':  description?.length > limit }"></span>
                                        <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="description = $el.textContent" contenteditable placeholder="Description" wire:ignore>{{ $new_item->description }}</div>
                                    </div>
                                    @error('new_item.description') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button x-show="!isUploading" class="mt-3 cursor-pointer inline-block bg-orange-600 hover:bg-transparent text-white hover:text-orange-600 font-bold px-4 py-3 border border-orange-600" type="submit">
                            Create
                        </button>
                    </div>
                    {{ json_encode($removed_items) }}
                </form>
            </div>
        </div>
        <div class="my-3 p-3 flex">
            <div class="italic inline-block flex-1">{{ count($selected_items) }} of {{ $max_allowed_items }} selected</div>
            <div class="flex-1 text-right">
                <button x-on:click="window.livewire.emitTo('{{$modal_name}}', 'Close')" class="cursor-pointer inline-block bg-orange-600 hover:bg-transparent text-white hover:text-orange-600 font-bold px-4 py-3 border border-orange-600">
                    Done
                </button>
            </div>
        </div>
    </x-modal>
</div>