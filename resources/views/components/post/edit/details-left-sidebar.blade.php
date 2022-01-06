<div class="hidden lg:block lg:col-span-3">
    <div class="sticky top-4 space-y-4">
        <div class="bg-white rounded-lg shadow py-4">
            <div class="mt-3 px-4">
                <div class="w-full mt-2">
                    <div class="flex space-x-3">
                        @include('components.dummy.poster')
                    </div>
                </div>
            </div>
            <hr class="mt-3"/>
            <div class="mt-3 px-4">
                <div class="mt-1 bg-gray-200 rounded w-full" style="height: 20px;"></div>
            </div>
            <hr class="mt-3"/>
            <div class="mt-3 px-4">
                <div class="mt-3 bg-gray-200 rounded w-1/2" style="height: 20px;"></div>
                <div class="mt-3 bg-gray-200 rounded w-1/2" style="height: 20px;"></div>
                <div class="mt-3 bg-gray-200 rounded w-1/2" style="height: 20px;"></div>
                <div class="mt-3 bg-gray-200 rounded w-1/2" style="height: 20px;"></div>
                <div class="mt-3 bg-gray-200 rounded w-1/2" style="height: 20px;"></div>
            </div>
            <hr class="mt-3"/>
            @include('components.post.edit.share')
            <hr class="mt-3"/>
            <div class="mt-3 px-4">
                <div class="mt-3 bg-gray-200 rounded w-2/3" style="height: 20px;"></div>
            </div>
        </div>
        <div class="mt-3 bg-white rounded-lg shadow">
            <div class="p-6">
                <h2 class="text-center font-medium text-gray-500 uppercase tracking-wider inline-block align-middle">
                    Collaborators
                </h2>
                <hr class="mt-3"/>
                <div class="mt-2">
                    <div class="mt-3 bg-orange-500 rounded w-1/3 text-center" style="height: 20px;"></div>
                </div>
                <div class="mt-1">
                    <span class="text-sm italic text-purple-800 cursor-pointer">Add Collaborator</span>
                </div>
            </div>
        </div>
    </div>
</div>
