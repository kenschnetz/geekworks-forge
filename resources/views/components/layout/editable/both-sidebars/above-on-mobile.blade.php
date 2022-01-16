<div class="w-full">
    @if($editing ?? false)
        <div class="max-w-3xl lg:max-w-7xl mx-auto sm:px-4 text-center">
            <div class="bg-white border border-orange-600 p-4">
                {{ $edit_buttons }}
            </div>
        </div>
    @endif
    <div class="max-w-3xl mx-auto sm:px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4 mt-3">
        <div class="w-full lg:col-span-3 mb-3 px-4 sm:p-0 sticky top-4">
            {{ $left_sidebar }}
        </div>
        <div class="block lg:hidden w-full lg:col-span-3 mb-3 px-4 sm:p-0">
            {{ $right_sidebar }}
        </div>
        <main class="lg:col-span-6 mb-3 px-4 sm:p-0">
            {{ $slot }}
        </main>
        <div class="hidden lg:block w-full lg:col-span-3 mb-3 px-4 sm:p-0 sticky top-4">
            {{ $right_sidebar }}
        </div>
    </div>
</div>
