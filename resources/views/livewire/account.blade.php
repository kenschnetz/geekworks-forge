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
                <x-dynamic-input :key="'user.name'" :placeholder="'User name'">{{ $user->name }}</x-dynamic-input>
                @error('user.name') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mt-3 flex space-x-3">
            <div class="min-w-0 flex-1">
                <x-dynamic-input :key="'user.email'" :placeholder="'User email'">{{ $user->email }}</x-dynamic-input>
                @error('user.email') <span class="text-red-600 error italic">{{ $message }}</span> @enderror
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
                <x-dynamic-input :limit="30" :key="'new_password'" :placeholder="'New password'">{{ $new_password }}</x-dynamic-input>
            </div>
        </div>
        <div class="mt-3 flex space-x-3">
            <div class="min-w-0 flex-1">
                <x-dynamic-input :limit="30" :key="'new_password_confirmation'" :placeholder="'Confirm password'">{{ $new_password_confirmation }}</x-dynamic-input>
            </div>
        </div>
        <div class="mt-3 text-right">
            <button wire:click="ChangePassword()" x-on:click="new_password_confirmation = ''" class="bg-gray-300 hover:bg-transparent text-white hover:text-gray-300 font-bold px-4 py-3 border border-gray-300" style="width:140px">
                Submit
            </button>
        </div>
    </div>
</div>
