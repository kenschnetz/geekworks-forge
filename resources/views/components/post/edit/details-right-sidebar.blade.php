<div class="w-full lg:block lg:col-span-3 px-4 sm:p-0 mt-3 md:mt-0">
    <div class="sticky top-4 space-y-4">
        @if($post_type === 'idea')
            <div class="bg-white shadow">
                <div class="p-4">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Attributes
                    </h2>
                    <div class="mt-2">
                        @if(count($attributes) > 0)
                            @foreach($attributes as $index => $post_attribute)
                                <div class="border border-gray-200 mt-2 px-2 py-1" x-data="{value: '', limit: 255 }">
                                    <span class="font-bold">{{ $post_attribute['name'] }}:</span>
                                    <div class="my-1 border border-purple-800 focus:border-purple-800">
                                        <span class="text-xs italic p-1 float-right" x-text="limit - value?.length" :class="{'text-gray-400':  value?.length <= limit, 'text-red-500':  value?.length > limit }"></span>
                                        <div class="editable-div px-2 py-1 focus:outline-none" x-init="value = $el.textContent" x-on:input="value = $el.textContent" contenteditable placeholder="Value" x-on:blur="$wire.set('attributes.{{$post_attribute['id']}}.value', value)">{{ $post_attribute['value'] }}</div>
                                    </div>
                                </div>
                                @error('attributes.' . $post_attribute['id'] . '.value') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                            @endforeach
                        @else
                            <div class="border border-gray-200 mt-1 p-3">
                                <div class="mt-1 bg-gray-100 rounded w-1/3" style="height: 20px;"></div>
                                <div class="mt-1 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
                            </div>
                        @endif
                    </div>
                    <div class="mt-1">
                        <span class="text-sm italic text-purple-800 cursor-pointer hover:underline" x-data="{}" x-on:click="window.livewire.emitTo('attribute-post-meta-modal', 'Show')">Manage Attributes</span>
                    </div>
                </div>
            </div>
            <div class="mt-3 bg-white shadow">
                <div class="p-4">
                    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                        Actions
                    </h2>
                    <div class="mt-2">
                        @if(count($actions) > 0)
                            @foreach($actions as $index => $post_action)
                                <div class="border border-gray-200 mt-2 px-2 py-1" x-data="{value: '', limit: 255 }">
                                    <span class="font-bold">{{ $post_action['name'] }}:</span>
                                    <div class="my-1 border border-purple-800 focus:border-purple-800">
                                        <span class="text-xs italic p-1 float-right" x-text="limit - value?.length" :class="{'text-gray-400':  value?.length <= limit, 'text-red-500':  value?.length > limit }"></span>
                                        <div class="editable-div px-2 py-1 focus:outline-none" x-init="value = $el.textContent" x-on:input="value = $el.textContent" contenteditable placeholder="Value" x-on:blur="$wire.set('actions.{{$post_action['id']}}.value', value)">{{ $post_action['value'] }}</div>
                                    </div>
                                </div>
                                @error('actions.' . $post_action['id'] . '.value') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                            @endforeach
                        @else
                            <div class="border border-gray-200 mt-1 p-3">
                                <div class="mt-1 bg-gray-100 rounded w-1/3" style="height: 20px;"></div>
                                <div class="mt-1 bg-gray-100 rounded w-2/3" style="height: 20px;"></div>
                            </div>
                        @endif
                    </div>
                    <div class="mt-1">
                        <span class="text-sm italic text-purple-800 cursor-pointer hover:underline" x-data="{}" x-on:click="window.livewire.emitTo('action-post-meta-modal', 'Show')">Manage Actions</span>
                    </div>
                </div>
            </div>
        @else
            @include('components.post.edit.tags')
        @endif
    </div>
</div>
