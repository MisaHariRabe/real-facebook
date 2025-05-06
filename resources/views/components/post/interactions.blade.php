<div class="flex justify-between text-[#65688c] py-1.5">
    <span id="like-count-{{ $post->id }}">
        {{ \App\Helpers\NumberFormatter::shorten($post->likes->count()) }}
        réaction{{ $post->likes->count() > 1 ? 's' : '' }}
    </span>
    <span>
        <span>
            {{ $post->comments->count() }} commentaire{{ $post->comments->count() > 1 ? 's' : '' }},
        </span>
        <span id="share-count-{{ $post->id }}">
            {{ \App\Helpers\NumberFormatter::shorten($post->shares->count()) }}
            partage{{ $post->shares->count() > 1 ? 's' : '' }}
        </span>
    </span>
</div>
