<div>
    <ul role="list" class="mt-3">
        @foreach($top_authors as $author)
            <div class="flex space-x-3 py-2">
                @include('components.author')
            </div>
        @endforeach
    </ul>
</div>
