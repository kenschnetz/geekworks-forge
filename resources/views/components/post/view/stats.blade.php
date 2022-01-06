<div class="flex space-x-6">
    <div class="inline-flex flex items-center space-x-2 text-sm text-gray-300">
        <i class="fas fa-thumbs-up"></i>
        <span class="font-semi-bold text-gray-500">{{ $post->upvotes_count }}</span>
    </div>
    <div class="inline-flex flex items-center space-x-2 text-sm text-gray-300">
        <i class="fas fa-comment-alt"></i>
        <span class="font-semi-bold text-gray-500">{{ $post->comments_count }}</span>
    </div>
    <div class="inline-flex flex items-center space-x-2 text-sm text-gray-300">
        <i class="fas fa-eye"></i>
        <span class="font-semi-bold text-gray-500">{{ $post->views_count }}</span>
    </div>
</div>
