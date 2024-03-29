<div>
    @if($editing)
        <div class="max-w-2xl mx-auto px-4 lg:max-w-7xl">
            <div class="my-3 bg-white dark:bg-zinc-700 shadow border border-orange-600 p-4 text-center">
                <button wire:click="CancelEdit()" class="bg-gray-400 hover:bg-transparent text-white hover:text-gray-400 font-bold px-4 py-3 border border-gray-600" style="width:140px">
                    Cancel
                </button>
                <button wire:click="SaveProfile()" class="bg-orange-500 hover:bg-transparent text-white hover:text-orange-500 font-bold px-4 py-3 border border-orange-500" style="width:140px">
                    Save
                </button>
            </div>
        </div>
    @endif
    <div class="max-w-2xl mx-auto px-4 lg:max-w-7xl lg:grid lg:grid-cols-12 lg:gap-4">
        <div class="hidden lg:block lg:col-span-3">
            @include('components.user.profile-left-sidebar')
        </div>
        <main class="lg:col-span-9" x-data="{ show_user_menu: false }" x-cloak="">
            <div class="bg-white dark:bg-zinc-700 p-4 shadow">
                <div class="flex xs:space-x-3 items-center justify-center">
                    @if($editing)
                        <button type="button" @class(['hidden xs:block flex-shrink-0 relative border-2 border-gray-300 border-dashed text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-700 p-4']) x-data="{}" x-on:click="window.livewire.emitTo('image-post-meta-modal', 'Show')">
                            @if(empty($profile_photo['path']))
                                <div class="xs:w-24 xs:h-24">
                                    <i class="fas fa-image-polaroid text-gray-300 fa-3x"></i>
                                    <span class="mt-2 block font-medium text-gray-300">
                                        Add Image
                                    </span>
                                </div>
                            @else
                                <div class="hidden xs:block flex-shrink-0">
                                    <img class="xs:w-24 xs:h-24" src="{{ ($profile_photo['path']) ?? '/storage/img/default-profile.jpg' }}" alt="">
                                </div>
                                <div class="absolute top-0 left-0 bottom-0 right-0 flex justify-center items-center bg-gray-200 bg-opacity-20 hover:bg-opacity-0">
                                    <i class="fas fa-image-polaroid text-white fa-3x"></i>
                                </div>
                            @endif
                        </button>
                    @else
                        <div class="hidden xs:block flex-shrink-0">
                            <img class="xs:w-32 xs:h-32" src="{{ ($profile_photo['path']) ?? '/storage/img/default-profile.jpg' }}" alt="">
                        </div>
                    @endif
                    <div class="min-w-0 flex-1">
                        @if($editing)
                            <button type="button" @class(['relative xs:hidden mb-3 mt-8 block w-full border-2 border-gray-300 border-dashed text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-700 p-6']) x-data="{}" x-on:click="window.livewire.emitTo('image-post-meta-modal', 'Show')">
                                @if(empty($profile_photo['path']))
                                    <div class="w-full">
                                        <i class="fas fa-image-polaroid text-gray-300 fa-3x"></i>
                                        <span class="mt-2 block font-medium text-gray-300">
                                            Add Image
                                        </span>
                                    </div>
                                @else
                                    <div class="xs:hidden">
                                        <img class="w-full shadow" src="{{ ($profile_photo['path']) ?? '/storage/img/default-profile.jpg' }}" alt="">
                                    </div>
                                    <div class="absolute top-0 left-0 bottom-0 right-0 flex justify-center items-center bg-gray-200 bg-opacity-20 hover:bg-opacity-0">
                                        <i class="fas fa-image-polaroid text-white fa-3x"></i>
                                    </div>
                                @endif
                            </button>
                        @else
                            <div class="xs:hidden mb-3 mt-8 border border-gray-300 p-6 bg-gray-100">
                                <img class="w-full shadow" src="{{ ($profile_photo['path']) ?? '/storage/img/default-profile.jpg' }}" alt="">
                            </div>
                        @endif
                        @if($editing)
                            <div class="flex space-x-3">
                                <div class="min-w-0 flex-1">
                                    <x-dynamic-input :key="'profile_user_edits.character.name'" :placeholder="'Character name'" class="dark:text-gray-300">{{ $profile_user_edits['character']->name }}</x-dynamic-input>
                                    @error('profile_user_edits.character.name') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @else
                            <h2 class="text-sm md:text-base inline-block text-lg text-gray-500 dark:text-gray-300 tracking-wider">
                                {{ $profile_user['character']->name }}
                                @if($profile_user->IsStaff())
                                    <i class="fas fa-crown text-purple-500"></i>
                                @elseif($profile_user->IsAdmin())
                                    <i class="fas fa-shield text-purple-500"></i>
                                @elseif($profile_user->IsTester())
                                    <i class="fas fa-vial text-purple-500"></i>
                                @endif
                            </h2>
                        @endif
                        <hr class="mt-3" />
                        <div class="mt-3">
                            @if($editing)
                                <div class="flex space-x-3">
                                    <div class="min-w-0 flex-1">
                                        <x-dynamic-input :key="'profile_user_edits.character.bio'" :placeholder="'Character name'" class="dark:text-gray-300">
                                            <x-slot name="pre">
                                                <i class="fas fa-sync-alt text-gray-200 hover:text-purple-700 cursor-pointer mr-3" style="font-size: 1.5em;" wire:click="Inspire()" x-on:click.debounce="SetValue(), SetLength()"></i>
                                            </x-slot>
                                            {{ $profile_user_edits['character']->bio }}
                                        </x-dynamic-input>
                                        @error('profile_user_edits.character.bio') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-300">
                                    {{ $profile_user['character']->bio }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="mt-3" />
                <div class="mt-3 spacy-y-2 md:grid md:grid-cols-4 md:gap-x-2">
                    <div class="w-full md:col-span-1">
                        @if($editing)
                            <div class="bg-gray-100 rounded w-full" style="height: 80px;"></div>
                        @else
                            <a @if($stats['idea_count'] > 0) href="{{ route('ideas', ['user_name' => $profile_user['character']->name]) }}" @endif>
                                <div @class(['w-full flex items-center justify-center inline-block font-bold uppercase tracking-wider border border-gray-200 p-1', 'text-gray-400' => $stats['idea_count'] <= 0, 'text-purple-700 dark:text-purple-500 hover:underline' => $stats['idea_count'] > 0]) style="height: 80px;">
                                    {{ $stats['idea_count'] }} {{ $stats['idea_count'] === 1 ? 'idea' : 'ideas' }}
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full mt-3 md:m-0 md:col-span-1">
                        @if($editing)
                            <div class="bg-gray-100 rounded w-full" style="height: 80px;"></div>
                        @else
                            <a @if($stats['question_count'] > 0) href="{{ route('questions', ['user_name' => $profile_user['character']->name]) }}" @endif>
                                <div @class(['w-full flex items-center justify-center inline-block font-bold uppercase tracking-wider border border-gray-200 p-1', 'text-gray-400' => $stats['question_count'] <= 0, 'text-purple-700 dark:text-purple-500 hover:underline' => $stats['question_count'] > 0]) style="height: 80px;">
                                    {{ $stats['question_count'] }} {{ $stats['question_count'] === 1 ? 'question' : 'questions' }}
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full mt-3 md:m-0 md:col-span-1">
                        @if($editing)
                            <div class="bg-gray-100 rounded w-full" style="height: 80px;"></div>
                        @else
                            <a @if($stats['question_count'] > 0) href="{{ route('questions', ['user_name' => $profile_user['character']->name]) }}" @endif>
                                <div @class(['w-full flex items-center justify-center inline-block font-bold uppercase tracking-wider border border-gray-200 p-1', 'text-gray-400' => $stats['article_count'] <= 0, 'text-purple-700 dark:text-purple-500 hover:underline' => $stats['article_count'] > 0]) style="height: 80px;">
                                    {{ $stats['article_count'] }} {{ $stats['article_count'] === 1 ? 'article' : 'articles' }}
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full mt-3 md:m-0 md:col-span-1">
                        @if($editing)
                            <div class="bg-gray-100 rounded w-full" style="height: 80px;"></div>
                        @else
                            <div @class(['w-full flex items-center justify-center inline-block font-bold uppercase tracking-wider border border-gray-200 p-1', 'text-gray-400' => $stats['comment_count'] <= 0, 'text-orange-600 dark:text-orange-500' => $stats['comment_count'] > 0]) style="height: 80px;">
                                {{ $stats['comment_count'] }} {{ $stats['comment_count'] === 1 ? 'comment' : 'comments' }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-full lg:hidden mt-3">
                @include('components.user.profile-left-sidebar')
            </div>
            @if(!$editing && count($top_posts) > 0)
                <div class="mt-3 bg-white dark:bg-zinc-700 p-4 shadow">
                    <h2 class="text-center font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider inline-block align-middle">
                        Top Posts
                    </h2>
                    <hr class="mt-3" />
                    @include('components.top-posts')
                </div>
            @endif
            @if(!$editing && count($recent_posts) > 0)
                <div class="mt-3 bg-white dark:bg-zinc-700 p-4 shadow">
                    <h2 class="text-center font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider inline-block align-middle">
                        Recent Posts
                    </h2>
                    <hr class="mt-3" />
                    @include('components.recent-posts')
                </div>
                @endif
                @if($can_edit)
                @livewire('image-post-meta-modal', ['selected_items' => $images, 'removed_items' => [], 'other_user_id' => $profile_user->id])
            @endif
        </main>
    </div>
</div>
