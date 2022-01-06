<div class="w-full">
    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8 mt-3">
        @section('page-title')
            {{ $post->ActivePostDetails->title }}
        @endsection
        @include('components.post.edit.details-left-sidebar')
        <main class="lg:col-span-6">
            <div class="px-4 sm:p-0">
                <div class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                    <article aria-labelledby="question-title-81614" x-data="{ post_menu_open: false }">
                        <div class="flex space-x-3">
                            <div class="min-w-0 flex-1">
                                <input wire:model="post_details.title" class="w-full px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800" placeholder="Post title" />
                                @error('post_details.title') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mt-1">
                            @include('components.post.view.system-category')
                        </div>
                        <div class="mt-3">
                            <input wire:model="post_details.description" class="w-full px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800" placeholder="Post description" />
                            @error('post_details.description') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                        </div>
                        <hr class="mt-3" />
                        <div class="mt-3 space-y-4">
                            <button type="button" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <i class="fas fa-image-polaroid text-gray-300 fa-3x"></i>
                                <span class="mt-2 block font-medium text-gray-300">
                                    Add Image
                                </span>
                            </button>
                        </div>
                        <hr class="mt-3"/>
                        <div class="mt-3 space-y-4" wire:ignore>
                            <trix-editor class="trix-editor" x-data x-on:trix-change="$dispatch('input', event.target.value)" wire:model.debounce.1000ms="post_details.content" wire:key="post-rich-editor"></trix-editor>
                            <p class="text-gray-400 text-sm mt-1">NOTE: external links will be stripped from the content</p>
                        </div>
                    </article>
                </div>
            </div>
        </main>
        @include('components.post.edit.details-right-sidebar')
    </div>
    <div class="w-full text-center mt-3 py-6">
        <button wire:click="Save(false)" class="bg-orange-500 hover:bg-transparent text-white hover:text-orange-500 font-bold px-4 py-3 border border-orange-500" style="width:140px">
            Save Draft
        </button>
        <button wire:click="Save(true)" class="bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800" style="width:140px">
            Publish
        </button>
    </div>
</div>
