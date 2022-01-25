<x-admin-tools.edit :title="$title" :list_route="$list_route">
    <div class="mt-3 w-full">
        <label class="text-gray-500 text-sm">Name
            <input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="item.name" placeholder="Name">
        </label>
        @error('item.name') <span class="text-red-500">{{$message}}</span> @enderror
    </div>
    <div class="mt-3 w-full">
        <label class="text-gray-500 text-sm">Email
            <input id="email" class="block mt-1 w-full" type="email" name="email" wire:model="item.email" placeholder="Email">
        </label>
        @error('item.email') <span class="text-red-500">{{$message}}</span> @enderror
    </div>
</x-admin-tools.edit>
