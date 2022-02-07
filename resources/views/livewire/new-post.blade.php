<div class="max-w-3xl mx-auto px-6">
    @section('page-title')
        New Post
    @endsection
    @include('components.post.new.progress')
    @if($step === 0)
        @include('components.post.new.type')
    @elseif($step === 1)
            @include('components.post.new.system')
    @elseif($step === 2)
            @include('components.post.new.category')
    @elseif($step === 3)
            @include('components.post.new.details')
    @endif
{{--TODO: add breadcrumbs for each step --}}
{{--    @include('components.post.new.breadcrumbs')--}}
</div>
