<div class="max-w-2xl mx-auto lg:px-4">
    <div class="mt-3 p-4">
        <h2 class="text-center font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider inline-block align-middle">
            Find something epic
        </h2>
        <hr class="mt-3" />
        <div class="mt-3 text-gray-500 italic">
            Enter a single term for a specific search or multiple terms for a broader search.
        </div>
        <x-dynamic-input :limit="50" :key="'search_term'" :placeholder="'What are you looking for?'" class="mt-3 dark:text-gray-300 flex items-center">
            {{ $search_term }}
            <x-slot name="post">
                <i class="ml-auto pl-3 fas fa-share-square text-gray-400 dark:text-gray-200 hover:text-purple-700 cursor-pointer" wire:click="AddSearchTerm()" style="font-size: 1.5em !important;"></i>
            </x-slot>
        </x-dynamic-input>
        @if(count($search_terms) > 0)
            <hr class="mt-3" />
            <div class="mt-3">
                <span wire:key="clear_all" class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-orange-500 text-white border border-orange-500 hover:shadow dark:bg-zinc-700 cursor-pointer" wire:click="ClearSearchTerms()">
                    Clear all
                </span>
                @foreach($search_terms as $index => $search_term)
                    <span wire:key="term_{{ $index }}" class="relative inline-flex items-center rounded-full mt-1 px-3 py-0.5 text-sm bg-orange-500 text-white border border-orange-500 hover:shadow dark:bg-zinc-700 cursor-pointer" wire:click="RemoveSearchTerm({{ $index }})">
                        <i class="fas fa-times-circle mr-3"></i> {{ $search_term }}
                    </span>
                @endforeach
            </div>
        @endif
        @if($posts->count() > 0)
            <ul role="list" class="mt-3 space-y-4">
                @foreach($posts as $post)
                    <li class="bg-white dark:bg-zinc-700 p-4 shadow sm:p-6">
                        @include('components.post.view.preview ')
                    </li>
                @endforeach
            @else
                <div class="mt-3 bg-white dark:bg-zinc-700 p-4 shadow sm:p-6 dark:text-gray-300">
                    {{ count($search_terms) > 0 ? 'No posts Found!' : 'Enter a search term above to get started!' }}
                </div>
            </ul>
        @endif
    </div>
</div>
