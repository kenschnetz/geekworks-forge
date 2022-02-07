<div class="mt-12">
    <h2 class="text-gray-500 font-bold uppercase tracking-wide text-center">Step 1. What kind of post would you like to create?</h2>
    <div class="mt-12 rounded-lg bg-gray-200 overflow-hidden divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-3 sm:gap-px md:flex">
        @foreach ($post_types as $post_type)
            <div class="relative group bg-white dark:bg-zinc-700 p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <h3 class="text-purple-700 text-lg font-bold text-gray-500 hover:underline cursor-pointer" wire:click="ChooseType({{ $post_type->id }})">
                    {{ $post_type->name }} <i class="fas fa-caret-right ml-3"></i>
                </h3>
                <p class="mt-2 text-sm">
                    {{ $post_type->description }}.
                </p>
            </div>
        @endforeach
    </div>
</div>
