<x-admin-tools.edit :title="$title" :list_route="$list_route">
    <div class="mt-4 w-full">
        <label class="text-gray-500 text-sm">Role
            <select class="form-control mt-1 w-full" name="system" wire:model="item.role_id">
                <option value="null">Select Role</option>
                @foreach (App\Models\Role::all() as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('item.role_id') <span class="text-red-500">System is required</span> @enderror
    </div>
    <div class="mt-3 w-full">
        <label class="text-gray-500 text-sm">Name
            <input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="item.name" placeholder="Name">
        </label>
        @error('item.name') <span class="text-red-500">{{$message}}</span> @enderror
    </div>
    <div class="mt-3 w-full">
        <label class="text-gray-500 text-sm">Email
            <input id="email" class="block mt-1 w-full" type="email" name="email" wire:model="item.email" placeholder="Email">
        </label>
        @error('item.email') <span class="text-red-500">{{$message}}</span> @enderror
    </div>
    @if(empty($item_id))
        <div class="mt-3 w-full">
            <label class="text-gray-500 text-sm">Password
                <input id="password" class="block mt-1 w-full" type="text" name="password" wire:model="password" placeholder="Password">
            </label>
            @error('password') <span class="text-red-500">{{$message}}</span> @enderror
        </div>
        <div class="mt-3 w-full">
            <label class="text-gray-500 text-sm">Confirm Password
                <input id="password_confirmation" class="block mt-1 w-full" type="text" name="password_confirmation" wire:model="password_confirmation" placeholder="Confirm Password">
            </label>
            @error('password_confirmation') <span class="text-red-500">{{$message}}</span> @enderror
        </div>
        <div class="mt-3 w-full">
            <button wire:click="GeneratePassword()" class="bg-orange-600 hover:bg-transparent text-white hover:text-orange-600 font-bold px-4 py-3 border border-orange-600 w-full sm:w-auto">
                Generate Password
            </button>
        </div>
    @else
        <hr class="mt-3" />
        <div class="mt-3 w-full">
            Last password reset sent: <i>{{ optional($item->last_password_reset_sent_at)->diffForHumans() ?? 'never' }}</i>
        </div>
        <div class="mt-3 w-full">
            @if($password_reset_sent)
                <strong class="text-green-600">Password reset notification sent!</strong>
            @else
                <button wire:click="SendPasswordReset()" class="bg-orange-600 hover:bg-transparent text-white hover:text-orange-600 font-bold px-4 py-3 border border-orange-600 w-full sm:w-auto">
                    Send Password Reset
                </button>
            @endif
        </div>
    @endif
{{--TODO: add tools for banning, muting, user admin notes, etc.--}}
</x-admin-tools.edit>
