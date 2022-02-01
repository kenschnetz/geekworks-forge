<div class="max-w-3xl mx-auto px-4" x-data="{}" x-cloak>
    @if(!empty($notification))
        <div class="bg-green-500 p-4 shadow mb-3 font-bold text-white relative">
            {{ $notification }}
            <i class="fas fa-times text-white absolute top-1/3 right-3" wire:click="CloseNotification()"></i>
        </div>
    @endif
    <div class="bg-white dark:bg-zinc-700 p-4 shadow">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Account Info
        </h2>
        <hr class="mt-3"/>
        <div class="mt-3 flex space-x-3">
            <div class="min-w-0 flex-1">
                <div x-data="{name: @entangle('user.name'), limit: 255 }">
                    <div class="border border-purple-800 focus:border-purple-800">
                        <span class="text-xs italic p-1 float-right" x-text="limit - name.length" :class="{'text-gray-400':  name.length <= limit, 'text-red-500':  name.length > limit }"></span>
                        <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="name = $el.textContent" contenteditable placeholder="Name" wire:ignore>{{ $user->name }}</div>
                    </div>
                    @error('user.name') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-3 flex space-x-3">
            <div class="min-w-0 flex-1">
                <div x-data="{email: @entangle('user.email'), limit: 255 }">
                    <div class="border border-purple-800 focus:border-purple-800">
                        <span class="text-xs italic p-1 float-right" x-text="limit - email.length" :class="{'text-gray-400':  email.length <= limit, 'text-red-500':  email.length > limit }"></span>
                        <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="email = $el.textContent" contenteditable placeholder="Name" wire:ignore>{{ $user->email }}</div>
                    </div>
                    @error('user.email') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-3 text-right">
            <button wire:click="Update()" class="bg-orange-500 hover:bg-transparent text-white hover:text-orange-500 font-bold px-4 py-3 border border-orange-500" style="width:140px">
                Update
            </button>
        </div>
    </div>
    <div class="mt-3 bg-white dark:bg-zinc-700 p-4 shadow">
        <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
            Change Password
        </h2>
        <hr class="mt-3"/>
        <div class="mt-3 flex space-x-3">
            <div class="min-w-0 flex-1">
                <div x-data="{new_password: @entangle('new_password'), limit: 255 }">
                    <div class="border border-purple-800 focus:border-purple-800">
                        <span class="text-xs italic p-1 float-right" x-text="limit - new_password.length" :class="{'text-gray-400':  new_password.length <= limit, 'text-red-500':  new_password.length > limit }"></span>
                        <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="new_password = $el.textContent" contenteditable placeholder="New password" wire:ignore>{{ $new_password }}</div>
                    </div>
                    @error('new_password') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-3 flex space-x-3">
            <div class="min-w-0 flex-1">
                <div x-data="{new_password_confirmation: @entangle('new_password_confirmation'), limit: 255 }">
                    <div class="border border-purple-800 focus:border-purple-800">
                        <span class="text-xs italic p-1 float-right" x-text="limit - new_password_confirmation.length" :class="{'text-gray-400':  new_password_confirmation.length <= limit, 'text-red-500':  new_password_confirmation.length > limit }"></span>
                        <div class="editable-div px-4 py-3 focus:outline-none" x-on:input="new_password_confirmation = $el.textContent"  contenteditable placeholder="Confirm password" wire:ignore>{{ $new_password_confirmation }}</div>
                    </div>
                    @error('new_password_confirmation') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-3 text-right">
            <button wire:click="ChangePassword()" x-on:click="new_password_confirmation = ''" class="bg-gray-300 hover:bg-transparent text-white hover:text-gray-300 font-bold px-4 py-3 border border-gray-300" style="width:140px">
                Submit
            </button>
        </div>
    </div>
</div>
