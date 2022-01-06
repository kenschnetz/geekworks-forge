<div>
    <ul role="list" class="mt-3">
        @foreach(\App\Models\User::whereHas('Posts')->withCount(['Posts' => function($query) {
            return $query->where('published', true)->where('moderated', false);
        }])->with('Character')->orderBy('posts_count', 'DESC')->take(3)->get() as $user)
            <div class="flex space-x-3 py-2">
                @include('components.poster')
            </div>
        @endforeach
    </ul>
</div>
