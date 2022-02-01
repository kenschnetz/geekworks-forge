<div class="mt-12">
    <h2 class="text-gray-500 font-bold uppercase tracking-wide text-center">Step 4. Enter the main details for your {{ $post_system_name }} {{ $post_category_name }} {{ match($post->post_type_id) { 1 => 'Idea', 2 => 'Question', 3 => 'Article' } }}</h2>

    <div class="mt-12 rounded-lg p-6 bg-white dark:bg-zinc-700" x-data="{ show_advanced_options: false }" x-cloak>
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
        @include('components.post.advanced-settings')
    </div>
</div>
