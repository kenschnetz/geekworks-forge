<x-sidebar>
    <div class="bg-white shadow mb-3">
        <div class="p-4">
            <a href="{{ route($route) }}" class="text-gray-900 group flex items-center cursor-pointer">
                <i class="mr-3 fas {{ $item_icon }} text-purple-800"></i>
                <span class="hover:underline">New {{ $item_name }}</span>
            </a>
        </div>
    </div>
</x-sidebar>
