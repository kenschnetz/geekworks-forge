<div class="h-screen flex flex-col p-2 lg:p-3 sticky top-0">
    <div class="mt-3 flex items-center flex-shrink-0">
        <a href="{{ route('timeline') }}">
            <img class="hidden lg:block px-3" src="/storage/img/logo.png" style="max-height: 24px">
            <img class="lg:hidden w-full" src="/storage/img/logo-mobile.png" style="max-height: 40px">
        </a>
    </div>
    <div class="mt-6 h-0 flex-1 flex flex-col overflow-y-auto relative">
        <div class="mt-3 space-y-2">
            <x-navigation.link :active="true" :icon="'fa-house'" :route="'timeline'">Home</x-navigation.link>
            <x-navigation.link :active="false" :icon="'fa-lightbulb'" :route="'timeline'">Ideas</x-navigation.link>
            <x-navigation.link :active="false" :icon="'fa-circle-question'" :route="'timeline'">Questions</x-navigation.link>
            <x-navigation.link :active="false" :icon="'fa-memo'" :route="'timeline'">Articles</x-navigation.link>
            <x-navigation.link :active="false" :icon="'fa-magnifying-glass'" :route="'timeline'">Search</x-navigation.link>
        </div>
        <div class="mt-3 flex justify-center lg:justify-start">
            <button type="button" class="inline-flex items-center justify-center rounded-full border border-transparent bg-orange-600 p-2 text-lg uppercase text-white shadow-sm hover:bg-purple-800 focus:outline-none lg:w-40">
                <div class="inline-flex items-center justify-center h-8 w-8 lg:mr-3">
                    <i class="fa-lg fa-solid fa-pen-nib lg:mr-3"></i>
                </div>
                <span class="hidden lg:block">Create</span>
            </button>
        </div>
        <div class="py-3 mt-auto w-full flex justify-center lg:justify-start">
            <div class="flex items-center text-purple-800 text-sm font-medium hover:underline cursor-pointer">
                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="">
                <span class="hidden lg:block">
                    <span class="ml-3">Jessy Schwarz</span><i class="ml-3 fa-solid fa-angle-down"></i>
                </span>
            </div>
        </div>
    </div>
</div>
