<div class="w-full">
    @if($editing ?? false)
        <div class="max-w-3xl lg:max-w-7xl mx-auto sm:px-4 text-center">
            <div class="bg-white border border-orange-600 p-4">
                {{ $edit_buttons }}
            </div>
        </div>
    @endif
    <div class="max-w-3xl mx-auto sm:px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4 mt-3">
        <div class="w-full block lg:hidden lg:col-span-3 mb-3 px-4 sm:p-0 sticky top-4">
            {{ $sidebar }}
        </div>
        <main class="lg:col-span-9 mb-3 px-4 sm:p-0">
            {{ $slot }}
        </main>
        <div class="w-full hidden lg:block lg:col-span-3 mb-3 px-4 sm:p-0 sticky top-4">
            {{ $sidebar }}
        </div>
    </div>
</div>
