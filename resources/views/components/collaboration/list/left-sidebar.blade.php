<x-sidebar>
    <div class="bg-white dark:bg-zinc-700 shadow mb-3">
        <div class="p-4">
            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                Collaborations
            </h2>
            <hr class="mt-3" />
            <div class="mt-3 w-full">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="show_your_requests" wire:click="$set('show_requests_from_others', false)" type="checkbox" name="toggle" id="toggle" class="text-purple-800 focus:ring-purple-800 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white dark:bg-zinc-700 border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Your requests only
                </div>
            </div>
            <div class="mt-3 w-full">
                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                    <input wire:model="show_requests_from_others" wire:click="$set('show_your_requests', false)" type="checkbox" name="toggle" id="toggle" class="text-purple-800 focus:ring-purple-800 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white dark:bg-zinc-700 border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <div class="relative inline-block ml-4">
                    Requests from others only
                </div>
            </div>
            <div class="mt-4 w-full">
                <label class="text-gray-500 text-sm">Status
                    <select class="form-control mt-1 w-full" name="system" wire:model="status">
                        <option value="any">Any</option>
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                    </select>
                </label>
                @error('item.role_id') <span class="text-red-500">System is required</span> @enderror
            </div>
        </div>
    </div>
</x-sidebar>
