<div class="relative">
    <pre id="post-content-{{ $post->id }}"
        class="text-sm leading-[19px] py-[10px] font-sans line-clamp-4 transition-all duration-300 ease-in-out whitespace-pre-line">{{ $post->content }}</pre>
    @if (strlen($post->content) > 300)
        <button onclick="toggleReadMore({{ $post->id }})" class="text-blue-500 my-2 hover:underline"
            id="read-more-btn-{{ $post->id }}">
            En voir plus...
        </button>
    @endif
</div>
