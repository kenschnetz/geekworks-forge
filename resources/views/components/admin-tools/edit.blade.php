<div class="max-w-2xl mx-auto bg-white shadow p-4">
    <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
        {{ $title }}
    </h2>
    <hr class="mt-3" />
    {{ $slot }}
    <hr class="mt-3" />
    <div class="w-full mt-3 text-right">
        <button wire:click="Cancel()" class="bg-gray-400 hover:bg-transparent text-white hover:text-gray-400 font-bold px-4 py-3 border border-gray-600 w-full sm:w-1/4" style="width:140px">
            Cancel
        </button>
        <button wire:click="Save()" class="bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800 w-full sm:w-1/4" style="width:140px">
            Save
        </button>
    </div>
</div>
