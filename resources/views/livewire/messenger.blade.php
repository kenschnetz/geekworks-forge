<div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
    @section('page-title')
        Messenger
    @endsection
    @include('components.messenger.left-sidebar')
    <main class="lg:col-span-8">
        <div class="px-4 sm:p-0">
            <div class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                @if(empty($selected_thread))
                    <p class="text-gray-400">
                        Select a thread to view messages
                    </p>
                @else
                    <div>
                        @if($new_thread)
                            <input wire:model="selected_thread.name" class="w-full px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800" placeholder="Thread name" />
                            @error('selected_thread.name') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                            <input wire:model="selected_thread.description" class="mt-3 w-full px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800" placeholder="Thread description" />
                            @error('selected_thread.description') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                            <div class="mt-3 w-full">
                                <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                                    <input wire:model="selected_thread.private" type="checkbox" name="toggle" id="toggle" class="text-purple-800 focus:ring-purple-800 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                </div>
                                <div class="relative inline-block ml-4">
                                    Private (only you can add new people into the thread)
                                </div>
                            </div>
                            @error('selected_thread.private') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                        @else
                            <p class="text-gray-400">
                                {{ $selected_thread->description }}
                            </p>
                            <hr class="my-3" />
                        @endif
                    </div>
                    <div class="ml-3">
                        @foreach($selected_thread->Users as $user)
                            <div class="inline-block text-center -ml-3 -mb-2">
                                <a href="{{ route('user-profile', ['id' => $user->id]) }}">
                                    <img class="h-10 w-10 rounded-full bg-gray-400 border border-2 border-white" src="{{ ($user->Character->ProfilePhoto->path ?? '/storage/img/default-profile.jpg') }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if(!$new_thread)
                        <hr class="my-3" />
                    @endif
                    <form id="comment-form" wire:submit.prevent="Submit">
                        @csrf
                        @error('content') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                        <div class="mt-3" x-data="{ content: @entangle('content') }">
                            <div class="px-4 py-3 border border-purple-800 focus:outline-none focus:border-purple-800 editable-div" x-on:blur="content = $el.textContent" contenteditable placeholder="Enter message">{{ $content }}</div>
                        </div>
                        <div class="mt-1 text-right">
                            <button type="submit" class="mt-1 bg-purple-800 hover:bg-transparent text-white hover:text-purple-800 font-bold px-4 py-3 border border-purple-800">
                                Submit
                            </button>
                        </div>
                    </form>
                    <div class="mt-3 border border-purple-800 bg-gray-50">
                        @if($selected_thread->messages->count() > 0)
                            <div style="max-height: 50vh; overflow-x: hidden; overflow-y: scroll;" x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); } }" x-init="scroll()" x-cloak>
                                @include('components.messenger.messages')
                            </div>
                        @else
                            <p class="text-gray-400 p-6">
                                No messages have been sent in this thread yet!
                            </p>
                        @endif
                    </div>
                @endif
            </input>
        </div>
    </main>
</div>
