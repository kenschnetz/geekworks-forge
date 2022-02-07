<div class="w-full lg:block lg:col-span-3 px-4 sm:p-0 mt-3 md:mt-0">
    <div class="sticky top-4 space-y-4">
        @if($post_type === 'idea')
            <div class="bg-white dark:bg-zinc-700 shadow">
                <div class="p-4">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Attributes
                    </h2>
                    <div class="mt-2">
                        @if(count($attributes) > 0)
                            @foreach($attributes as $index => $post_attribute)
                                @if($is_collaboration)
                                    <div class="border border-gray-200 mt-2 p-2 text-sm">
                                        <span class="font-bold">{{ $post_attribute['name'] }}:</span> {{ $post_attribute['value'] }}
                                    </div>
                                @else
                                    <div class="border border-gray-200 mt-2 px-2 py-1" wire:key="post_attribute_{{ $post_attribute['id'] }}">
                                        <span class="font-bold">{{ $post_attribute['name'] }}:</span>
                                        <x-dynamic-input :key="'attributes.' . $post_attribute['id'] . '.value'" :placeholder="'Value'">{{ $post_attribute['value'] }}</x-dynamic-input>
                                    </div>
                                    @error('attributes.' . $post_attribute['id'] . '.value') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                                @endif
                            @endforeach
                        @else
                            <div class="border border-gray-200 mt-1 p-3">
                                <div class="mt-1 bg-gray-100 rounded w-1/3" style="height: 20px;"></div>
                                <div class="mt-1 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
                            </div>
                        @endif
                    </div>
                    @if(!$is_collaboration)
                        <div class="mt-1">
                            <span class="text-sm italic text-purple-700 cursor-pointer hover:underline" x-data="{}" x-on:click="window.livewire.emitTo('attribute-post-meta-modal', 'Show')" wire:ignore>Manage Attributes</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-3 bg-white dark:bg-zinc-700 shadow">
                <div class="p-4">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Actions
                    </h2>
                    <div class="mt-2">
                        @if(count($actions) > 0)
                            @foreach($actions as $index => $post_action)
                                @if($is_collaboration)
                                    <div class="border border-gray-200 mt-2 p-2 text-sm">
                                        <span class="font-bold">{{ $post_action['name'] }}:</span> {{ $post_action['value'] }}
                                    </div>
                                @else
                                    <div class="border border-gray-200 mt-2 px-2 py-1" wire:key="post_action_{{ $post_action['id'] }}">
                                        <span class="font-bold">{{ $post_action['name'] }}:</span>
                                        <x-dynamic-input :key="'actions.' . $post_action['id'] . '.value'" :placeholder="'Value'">{{ $post_action['value'] }}</x-dynamic-input>
                                    </div>
                                    @error('actions.' . $post_action['id'] . '.value') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                                @endif
                            @endforeach
                        @else
                            <div class="border border-gray-200 mt-1 p-3">
                                <div class="mt-1 bg-gray-100 rounded w-1/3" style="height: 20px;"></div>
                                <div class="mt-1 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
                            </div>
                        @endif
                    </div>
                    @if(!$is_collaboration)
                        <div class="mt-1">
                            <span class="text-sm italic text-purple-700 cursor-pointer hover:underline" x-data="{}" x-on:click="window.livewire.emitTo('action-post-meta-modal', 'Show')">Manage Actions</span>
                        </div>
                    @endif
                </div>
            </div>
        @else
            @include('components.post.edit.tags')
        @endif
    </div>
</div>
