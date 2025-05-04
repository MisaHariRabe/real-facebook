<div class="w-full">
    <h3 class="mb-4">Comments</h3>
    @foreach ($post->comments as $comment)
        <x-comment :comment="$comment" />
    @endforeach
</div>
