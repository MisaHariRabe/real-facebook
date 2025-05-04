<div class="w-full">
    <h3 class="mb-4 text-[15px] leading-[19px] font-semibold text-[#65686C]">Comments</h3>
    @foreach ($post->comments as $comment)
        <x-comment :comment="$comment" />
    @endforeach
</div>
