<div class="mt-12">
    <h2 class="text-gray-500 font-bold uppercase tracking-wide text-center">Step 3. What {{ $choose_sub_category? 'sub-category' : 'category' }} does your {{ $post_system_name }} {{ match($post->post_type_id) { 1 => 'Idea', 2 => 'Question', 3 => 'Article' } }} belong to?</h2>
    {{--TODO: add searchbar here for filtering categories--}}
    <div class="mt-12 rounded-lg overflow-hidden divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-3 sm:gap-px">
        @if($choose_sub_category)
            @foreach (\App\Models\Category::find($post->category_id)->Categories as $category)
                <div class="md:col-span-1 relative group bg-white dark:bg-zinc-700 p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 md:flex">
                    <div>
                        <h3 class="text-purple-800 text-lg font-bold text-gray-500 hover:underline cursor-pointer" wire:click="ChooseCategory({{ $category->id }}, '{{ $category->name }}')">
                            {{ $category->name }} <i class="fas fa-caret-right ml-3"></i>
                        </h3>
                        <p class="mt-2 text-sm">
                            {{ $category->description }}.
                        </p>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($categories as $category)
            <div class="md:col-span-1 relative group bg-white dark:bg-zinc-700 p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 md:flex">
                <div>
                    <h3 class="text-purple-800 text-lg font-bold text-gray-500 hover:underline cursor-pointer" wire:click="ChooseCategory({{ $category->id }}, '{{ $category->name }}')">
                        {{ $category->name }} <i class="fas fa-caret-right ml-3"></i>
                    </h3>
                    <p class="mt-2 text-sm">
                        {{ $category->description }}.
                    </p>
                </div>
            </div>
            @endforeach
        @endif
        </div>
    <div class="mt-3">
        {{ $categories->links() }}
    </div>
</div>
