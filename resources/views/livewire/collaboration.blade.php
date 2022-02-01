<div class="max-w-2xl mx-auto sm:px-4 lg:max-w-7xl">
    <div class="lg:col-span-5 bg-white dark:bg-zinc-700 p-4 text-center">
        <button wire:click="Cancel()" class="bg-gray-400 hover:bg-transparent text-white hover:text-gray-400 font-bold px-4 py-3 border border-gray-600" style="width:140px">
            Back
        </button>
        @if($collaboration->status === 'Open')
            <button wire:click="Close()" class="bg-red-600 hover:bg-transparent text-white hover:text-red-600 font-bold px-4 py-3 border border-red-800" style="width:140px">
                {{ $my_collaboration ? 'Withdraw' : 'Decline' }}
            </button>
            @if(!$my_collaboration && ($collaboration->title_accepted || $collaboration->description_accepted || $collaboration->content_accepted))
                <button wire:click="Collaborate()" class="bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800" style="width:140px">
                    Collaborate
                </button>
            @endif
        @endif
    </div>
    <div class="lg:col-span-5 bg-white dark:bg-zinc-700 p-4 mt-3">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Collaboration request for <a class="text-purple-600 hover:underline" href="{{ route('post', ['slug' => $original_post_details->Post->slug]) }}">{{ $original_post_details->title }}</a>
        </h2>
        <hr class="mt-3" />
        <p class="mt-3">
            {{ $collaboration->summary }}
        </p>
    </div>
    <div class="hidden lg:block lg:flex lg:space-x-4 mt-3">
        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">
            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider align-middle">
                Original
            </h2>
        </div>
        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">
            <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider align-middle">
                Collaboration
            </h2>
        </div>
    </div>
{{--TODO: show icon next to each item denoting whether or not it was accepted or declined--}}
    @if($this->has_title_changes)
        <div class="lg:flex lg:space-x-4 mt-3">
            <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4 flex items-center">
                <div>
                    <div class="text-sm underline">Original Title</div>
                    @if($collaboration->status === 'Open' && $collaboration->title_accepted)
                        {{ $new_post_details->title }}
                    @else
                        {!! $this->FormatDiff($new_post_details->title, $collaboration->title) !!}
                    @endif
                </div>
            </div>
            @if(!$my_collaboration && $collaboration->status === 'Open')
                <div class="border-y lg:border-y-0 bg-white lg:bg-transparent lg:flex-none p-2 flex items-center justify-center">
                    @if($collaboration->title_accepted)
                        <i wire:click="Unaccept('title')" class="hidden lg:block text-red-600 hover:text-red-800 fas fa-chevron-circle-right fa-2x cursor-pointer"></i>
                        <i wire:click="Unaccept('title')" class="lg:hidden text-red-600 hover:text-red-800 fas fa-chevron-circle-down fa-2x cursor-pointer"></i>
                    @else
                        <i wire:click="Accept('title')" class="hidden lg:block text-green-600 hover:text-green-800 fas fa-chevron-circle-left fa-2x cursor-pointer"></i>
                        <i wire:click="Accept('title')" class="lg:hidden text-green-600 hover:text-green-800 fas fa-chevron-circle-up fa-2x cursor-pointer"></i>
                    @endif
                </div>
            @endif
            <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4 flex items-center">
                <div>
                    <div class="text-sm underline">Collaboration Title</div>
                    @if($collaboration->status === 'Open' && $collaboration->title_accepted)
                        {{ $collaboration->title }}
                    @else
                        {!! $this->FormatDiff($new_post_details->title, $collaboration->title, 'new') !!}
                    @endif
                </div>
            </div>
        </div>
    @endif
    @if($this->has_description_changes)
        <div class="lg:flex lg:space-x-4 mt-3">
            <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4 flex items-center">
                <div>
                    <div class="text-sm underline">Original Description</div>
                    @if($collaboration->status === 'Open' && $collaboration->description_accepted)
                        {{ $new_post_details->description }}
                    @else
                        {!! $this->FormatDiff($new_post_details->description, $collaboration->description) !!}
                    @endif
                </div>
            </div>
            @if(!$my_collaboration && $collaboration->status === 'Open')
                <div class="border-y lg:border-y-0 bg-white lg:bg-transparent lg:flex-none p-2 flex items-center justify-center">
                    @if($collaboration->description_accepted)
                        <i wire:click="Unaccept('description')" class="hidden lg:block text-red-600 hover:text-red-800 fas fa-chevron-circle-right fa-2x cursor-pointer"></i>
                        <i wire:click="Unaccept('description')" class="lg:hidden text-red-600 hover:text-red-800 fas fa-chevron-circle-down fa-2x cursor-pointer"></i>
                    @else
                        <i wire:click="Accept('description')" class="hidden lg:block text-green-600 hover:text-green-800 fas fa-chevron-circle-left fa-2x cursor-pointer"></i>
                        <i wire:click="Accept('description')" class="lg:hidden text-green-600 hover:text-green-800 fas fa-chevron-circle-up fa-2x cursor-pointer"></i>
                    @endif
                </div>
            @endif
            <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4 flex items-center">
                <div>
                    <div class="text-sm underline">Collaboration Description</div>
                    @if($collaboration->status === 'Open' && $collaboration->description_accepted)
                        {{ $collaboration->description }}
                    @else
                        {!! $this->FormatDiff($new_post_details->description, $collaboration->description, 'new') !!}
                    @endif
                </div>
            </div>
        </div>
    @endif
    @if($this->has_content_changes)
        <div class="lg:flex lg:space-x-4 mt-3">
            <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4 flex items-center">
                <div>
                    <div class="text-sm underline">Original Content</div>
                    @if($collaboration->status === 'Open' && $collaboration->content_accepted)
                        {!! $new_post_details->content !!}
                    @else
                        {!! $this->FormatDiff($new_post_details->content, $collaboration->content) !!}
                    @endif
                </div>
            </div>
            @if(!$my_collaboration && $collaboration->status === 'Open')
                <div class="border-y lg:border-y-0 bg-white lg:bg-transparent lg:flex-none p-2 flex items-center justify-center">
                    @if($collaboration->content_accepted)
                        <i wire:click="Unaccept('content')" class="hidden lg:block text-red-600 hover:text-red-800 fas fa-chevron-circle-right fa-2x cursor-pointer"></i>
                        <i wire:click="Unaccept('content')" class="lg:hidden text-red-600 hover:text-red-800 fas fa-chevron-circle-down fa-2x cursor-pointer"></i>
                    @else
                        <i wire:click="Accept('content')" class="hidden lg:block text-green-600 hover:text-green-800 fas fa-chevron-circle-left fa-2x cursor-pointer"></i>
                        <i wire:click="Accept('content')" class="lg:hidden text-green-600 hover:text-green-800 fas fa-chevron-circle-up fa-2x cursor-pointer"></i>
                    @endif
                </div>
            @endif
            <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">
                <div>
                    <div class="text-sm underline">Collaboration Content</div>
                    @if($collaboration->status === 'Open' && $collaboration->content_accepted)
                        {!! $collaboration->content !!}
                    @else
                        {!! $this->FormatDiff($new_post_details->content, $collaboration->content, 'new') !!}
                    @endif
                </div>
            </div>
        </div>
    @endif
{{--    <div class="lg:flex lg:space-x-4 mt-3">--}}
{{--        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">--}}
{{--            Original tags--}}
{{--        </div>--}}
{{--        @if(!$my_collaboration)--}}
{{--            <div class="lg:flex-none p-2 flex items-center justify-center">--}}
{{--                <i class="text-orange-600 hover:text-purple-800 fas fa-chevron-circle-left fa-2x cursor-pointer"></i>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">--}}
{{--            Collaboration tags--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="lg:flex lg:space-x-4 mt-3">--}}
{{--        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">--}}
{{--            Original attributes--}}
{{--        </div>--}}
{{--        @if(!$my_collaboration)--}}
{{--            <div class="lg:flex-none p-2 flex items-center justify-center">--}}
{{--                <i class="text-orange-600 hover:text-purple-800 fas fa-chevron-circle-left fa-2x cursor-pointer"></i>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">--}}
{{--            Collaboration attributes--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="lg:flex lg:space-x-4 mt-3">--}}
{{--        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">--}}
{{--            Original actions--}}
{{--        </div>--}}
{{--        @if(!$my_collaboration)--}}
{{--            <div class="lg:flex-none p-2 flex items-center justify-center">--}}
{{--                <i class="text-orange-600 hover:text-purple-800 fas fa-chevron-circle-left fa-2x cursor-pointer"></i>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="lg:flex-1 bg-white dark:bg-zinc-700 p-4">--}}
{{--            Collaboration actions--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
