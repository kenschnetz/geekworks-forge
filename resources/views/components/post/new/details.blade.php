<div class="mt-12">
    <h2 class="text-gray-500 font-bold uppercase tracking-wide text-center">Step 4. Enter the main details for your {{ $post_system_name }} {{ $post_category_name }} {{ match($post->post_type_id) { 1 => 'Idea', 2 => 'Question', 3 => 'Article' } }}</h2>

    <div class="mt-12 rounded-lg p-6 bg-white" x-data="{ show_advanced_options: false }" x-cloak>
        <p class="mt-3 text-gray-400">The post title is the first thing people will see in the feed, so be creative!</p>
        <input wire:model="post_details.title" class="mt-3 w-full px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800" placeholder="Post title" />
        @error('post_details.title') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
        <hr class="my-3"/>
        <p class="mt-3 text-gray-400">The post description (optional) is a summary of the main post content. </p>
        <input wire:model="post_details.description" class="mt-3 w-full px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800" placeholder="Post description" />
        @error('post_details.description') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
        <hr class="my-3" />
        <div class="mt-3 w-full text-right">
            <button wire:click="CreatePost()" class="mt-1 bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800">
                Create Post
            </button>
        </div>
        <hr class="my-3" />
        <div class="mt-3 w-full">
            <span x-on:click="show_advanced_options = !show_advanced_options" class="cursor-pointer text-gray-900 group flex items-center py-2">
                <span class="font-medium text-gray-500 uppercase tracking-wider align-middle hover:underline" style="margin-top: 2px !important;">
                    Advanced Options <i x-show="!show_advanced_options" class="ml-2 fas fa-caret-down"></i><i x-show="show_advanced_options" class="ml-2 fas fa-caret-up"></i>
                </span>
            </span>
        </div>
        <div x-show="show_advanced_options" class="mt-3">
            <div class="mt-3 w-full">
                <p class="mt-3 text-gray-400">NOTE: the settings below are set to the recommended default.</p>
            </div>
            <div class="mt-3 w-full">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="post.allow_conversions" type="checkbox" name="toggle" id="toggle" class="text-purple-800 focus:ring-purple-800 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Allow conversions to other systems
                </div>
            </div>
            @error('post.allow_conversions') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
            <div class="mt-3 text-gray-400 ml-8">
                If on, other users can convert your post to another system. Otherwise, the post will not be convertable for the next 90 days, at which time it will be opened for conversions.
                <hr class="mt-1" />
            </div>
            <div class="mt-3 w-full">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="post_details.requesting_recommendations" type="checkbox" name="toggle" id="toggle" class="text-purple-800 focus:ring-purple-800 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Request recommendations
                </div>
            </div>
            <div class="mt-3 text-gray-400 ml-8">
                If on, this post will be highlighted to other users who are looking to collaborate. Don't worry, you will be able to review and control all recommendations!
                <hr class="mt-1" />
            </div>
            @error('post_details.requesting_recommendations') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
            @if($post->allow_conversions)
                <div class="mt-3 w-full">
                    <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                        <input wire:model="post_details.requesting_conversions" type="checkbox" name="toggle" id="toggle" class="text-purple-800 focus:ring-purple-800 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                    <div class="relative inline-block ml-4">
                        Request conversions
                    </div>
                </div>
                @error('post_details.requesting_conversions') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                <div class="mt-3 text-gray-400 ml-8">
                    If on, this post will be highlighted to other users who are looking to collaborate. Don't worry, you will be able to review and control all conversions!
                    <hr class="mt-1" />
                </div>
            @endif
            <div class="mt-3 w-full">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="post.is_art_only" type="checkbox" name="toggle" id="toggle" class="text-purple-800 focus:ring-purple-800 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Art only post
                </div>
            </div>
            @error('post.is_art_only') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
            <div class="mt-3 text-gray-400 ml-8">
                If on, this post is an art only post where you certify that <span class="font-bold text-red-600">THE ORIGINAL ART IS OWNED BY YOU</span>. Do not create an art post for assets you do not personally own.
                <hr class="mt-1" />
            </div>
        </div>
    </div>
</div>
