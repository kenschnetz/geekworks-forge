<div>
    <div class="mt-3 space-y-2">
        @foreach($top_authors as $author)
            <x-author :author="App\Models\User::find($author['id'])"></x-author>
        @endforeach
    </div>
</div>
