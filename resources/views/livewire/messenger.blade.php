<div class="max-w-3xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-8">
    @section('page-title')
        Messenger
    @endsection
    @include('components.messenger.left-sidebar')
    <main class="lg:col-span-8">
        <div class="bg-white dark:bg-zinc-700 px-4 py-6 shadow sm:p-6">
            @if(empty($selected_thread))
                <p class="text-gray-400 dark:text-gray-300">
                    Select a thread to view messages
                </p>
            @else
                <div>
                    @if($new_thread)
                        <div class="mt-3">
                            <x-dynamic-input :key="'selected_thread.name'" :placeholder="'Thread name'" class="dark:text-gray-300">{{ $selected_thread->name }}</x-dynamic-input>
                            @error('selected_thread.name') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-3">
                            <x-dynamic-input :key="'selected_thread.description'" :placeholder="'Thread name'" class="dark:text-gray-300">{{ $selected_thread->description }}</x-dynamic-input>
                            @error('selected_thread.description') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-3 w-full dark:text-gray-300">
                            <div class="relative inline-block mr-4 align-middle select-none transition duration-200 ease-in">
                                <input wire:model="selected_thread.private" type="checkbox" name="toggle" id="toggle" class="text-purple-700 focus:ring-purple-700 toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                            </div>
                            <div class="relative inline-block ml-4">
                                Private (only you can add new people into the thread)
                            </div>
                        </div>
                        @error('selected_thread.private') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                    @else
                        <p class="text-gray-400 dark:text-gray-300">
                            {{ $selected_thread->description }}
                        </p>
                        <hr class="my-3" />
                    @endif
                </div>
                <div class="ml-3 dark:text-gray-300">
                    @foreach($selected_thread->Users as $thread_user)
                        <div class="inline-block text-center -ml-3 -mb-2">
                            <a href="{{ route('user-profile', ['user_name' => $thread_user->Character->name]) }}">
                                <img class="h-10 w-10 rounded-full bg-gray-400 border border-2 border-white" src="{{ ($thread_user->Character->ProfilePhoto->path ?? '/storage/img/default-profile.jpg') }}" alt="">
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
                    <div class="mt-3">
                        <x-dynamic-input :limit="0" :key="'content'" :placeholder="'Enter message'" wire:ignore class="dark:text-gray-300">{{ $content }}</x-dynamic-input>
                    </div>
                    <div class="mt-1 text-right">
                        <button type="submit" x-on:click="content = null" class="mt-1 bg-purple-700 hover:bg-transparent text-white hover:text-purple-700 font-bold px-4 py-3 border border-purple-700">
                            Submit
                        </button>
                    </div>
                </form>
                <div class="mt-3 border border-purple-700 bg-gray-50 dark:bg-zinc-600 dark:text-gray-300">
                    @if($selected_thread->messages->count() > 0)
                        <div style="max-height: 50vh; overflow-x: hidden; overflow-y: scroll;" x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); } }" x-init="scroll()" x-cloak>
                            @include('components.messenger.messages')
                        </div>
                    @else
                        <p class="text-gray-400 dark:text-gray-300 p-6">
                            No messages have been sent in this thread yet!
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </main>
</div>
