<div class="w-full">
    <div class="max-w-3xl lg:max-w-7xl mx-auto sm:px-4 text-center">
        <div class="bg-white dark:bg-zinc-700 border border-orange-600 p-4">
            <button wire:click="Cancel()" class="bg-gray-400 hover:bg-transparent text-white hover:text-gray-400 font-bold px-4 py-3 border border-gray-600" style="width:140px">
                Cancel
            </button>
            @if($is_collaboration)
                <button wire:click="Submit()" class="bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800" style="width:140px">
                    Submit
                </button>
            @else
                @if($post->published)
                    <button wire:click="Unpublish()" class="bg-orange-500 hover:bg-transparent text-white hover:text-orange-500 font-bold px-4 py-3 border border-orange-500" style="width:140px">
                        Unpublish
                    </button>
                @else
                    <button wire:click="Save(false)" class="bg-orange-500 hover:bg-transparent text-white hover:text-orange-500 font-bold px-4 py-3 border border-orange-500" style="width:140px">
                        Save
                    </button>
                @endif
                <button wire:click="Save(true)" class="bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800" style="width:140px">
                    Publish
                </button>
            @endif
        </div>
    </div>
    <div class="max-w-3xl mx-auto sm:px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4 mt-3">
        @section('page-title')
            {{ $post->ActivePostDetails->title }}
        @endsection
        <div class="hidden lg:block w-full lg:col-span-3 mb-3 px-4 sm:p-0">
            @include('components.post.edit.details-left-sidebar')
        </div>
        <main class="lg:col-span-6 mb-3 px-4 sm:p-0">
            <div class="bg-white dark:bg-zinc-700 px-4 py-6 shadow sm:p-6">
                <article aria-labelledby="question-title-81614" x-data="{ post_menu_open: false }">
                    <div class="flex space-x-3">
                        <div class="min-w-0 flex-1">
                            <div x-data="{title: @entangle('post_details.title'), limit: 255 }">
                                <div class="border border-purple-800 focus:border-purple-800">
                                    <span class="text-xs italic p-1 float-right" x-text="limit - title.length" :class="{'text-gray-400':  title.length <= limit, 'text-red-500':  title.length > limit }"></span>
                                    <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="title = $el.textContent" contenteditable placeholder="Post title" wire:ignore>{{ $post_details->title }}</div>
                                </div>
                                @error('post_details.title') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-1">
                        <div class="mt-3 bg-gray-100 rounded w-1/4" style="height: 20px;"></div>
                    </div>
                    <div class="mt-3">
                        <div x-data="{description: @entangle('post_details.description'), limit: 255 }">
                            <div class="border border-purple-800 focus:border-purple-800">
                                <span class="text-xs italic p-1 float-right" x-text="limit - description.length" :class="{'text-gray-400':  description.length <= limit, 'text-red-500':  description.length > limit }"></span>
                                <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="description = $el.textContent" contenteditable placeholder="Post description" wire:ignore>{{ $post_details->description }}</div>
                            </div>
                            @error('post_details.description') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @if(!$is_collaboration)
                        <hr class="mt-3" />
                        <div class="mt-3 space-y-4">
                            <button type="button" @class(['relative block w-full border-2 border-gray-300 border-dashed text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-800', ' p-12' => empty($post_image), 'p-3' => !empty($post_image)]) x-data="{}" x-on:click="window.livewire.emitTo('image-post-meta-modal', 'Show')">
                                @if(empty($post_image))
                                    <i class="fas fa-image-polaroid text-gray-300 fa-3x"></i>
                                    <span class="mt-2 block font-medium text-gray-300">
                                        Add Image
                                    </span>
                                @else
                                    <img src="{{$post_image['path']}}" class="mb-3" />
                                    <div class="absolute top-0 left-0 bottom-0 right-0 flex justify-center items-center bg-gray-200 bg-opacity-20 hover:bg-opacity-0">
                                        <i class="fas fa-image-polaroid text-white fa-3x"></i>
                                    </div>
                                @endif
                            </button>
                        </div>
                    @endif
                    <hr class="mt-3"/>
                    <div class="mt-3 space-y-4" wire:ignore>
                        <trix-editor class="trix-editor" x-data x-on:trix-change="$dispatch('input', event.target.value)" wire:model.debounce.1000ms="post_details.content" wire:key="post-rich-editor"></trix-editor>
                        <p class="text-gray-400 text-sm mt-1">NOTE: external links will be stripped from the content</p>
                    </div>
                </article>
            </div>
            <div class="mt-3 md:hidden">
                @include('components.post.edit.details-left-sidebar')
            </div>
            @if($post_type === 'idea')
                <div class="col-span-4 px-4 sm:p-0">
                    <div class="mt-3 bg-white dark:bg-zinc-700 shadow">
                        <div class="p-6">
                            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                                Collaborators
                            </h2>
                            <hr class="mt-3"/>
                            <div class="mt-2">
                                <div class="mt-3 bg-gray-100 rounded w-1/3 text-center inline-block" style="height: 20px;"></div>
                                <div class="mt-3 bg-gray-100 rounded w-1/3 text-center inline-block" style="height: 20px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($is_collaboration)
                <div class="col-span-4 px-4 sm:p-0">
                    <div class="mt-3 bg-white dark:bg-zinc-700 shadow">
                        <div class="p-6">
                            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                                Summarize your collaboration
                            </h2>
                            <hr class="mt-3"/>
                            <div class="mt-2">
                                <div class="flex space-x-3">
                                    <div class="min-w-0 flex-1">
                                        <div x-data="{summary: @entangle('summary'), limit: 255 }">
                                            <div class="border border-purple-800 focus:border-purple-800">
                                                <span class="text-xs italic p-1 float-right" x-text="summary - summary.length" :class="{'text-gray-400':  summary.length <= limit, 'text-red-500':  summary.length > limit }"></span>
                                                <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="summary = $el.textContent" contenteditable placeholder="Collaboration summary" wire:ignore>{{ $summary }}</div>
                                            </div>
                                            @error('summary') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(!$is_collaboration)
                <div class="col-span-4 px-4 sm:p-0">
                    <div class="mt-3 bg-white dark:bg-zinc-700 shadow">
                        <div class="p-6" x-data="{ show_advanced_options: false }" x-cloak>
                            @include('components.post.advanced-settings')
                        </div>
                    </div>
                </div>
            @endif
        </main>
        @include('components.post.edit.details-right-sidebar')
    </div>
    @livewire('tag-post-meta-modal', ['post' => $post, 'post_details' => $post_details, 'selected_items' => $tags, 'removed_items' => $removed_tags])
    @livewire('image-post-meta-modal', ['post' => $post, 'post_details' => $post_details, 'selected_items' => $images, 'removed_items' => $removed_images])
    @if($post_type === 'idea')
        @livewire('attribute-post-meta-modal', ['post' => $post, 'post_details' => $post_details, 'selected_items' => $attributes, 'removed_items' => $removed_attributes])
        @livewire('action-post-meta-modal', ['post' => $post, 'post_details' => $post_details, 'selected_items' => $actions, 'removed_items' => $removed_actions])
    @endif
</div>
