<div x-data="{show: @entangle($attributes->wire('model')).defer}" x-show="show" x-cloak>
    <div class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-full" x-show="show">
        <div class="w-full lg:w-2/3 xl:w-1/2 m-0 p-0 md:m-4 md:p-4 lg:m-auto bg-white dark:bg-zinc-700 shadow-2xl" style="max-height: 100% !important; overflow-x: hidden !important; overflow-y: scroll !important;">
            {{ $slot }}
        </div>
    </div>
</div>
