<div class="border-t border-b border-[#77797d]/20 p-0 flex sm:gap-4 justify-evenly items-center">
    <button onclick="likeUnlikePost({{ $post->id }})" id="like-btn-{{ $post->id }}"
        class="px-4 py-2 rounded-sm gap-2 flex items-center justify-center font-semibold {{ $post->likes->contains('user_id', Auth::id()) ? 'text-blue-500' : 'text-[#77797d]' }}">
        <i class="bi bi-hand-thumbs-up{{ $post->likes->contains('user_id', Auth::id()) ? '-fill' : '' }} text-lg"></i>
        <span>J'aime</span>
    </button>


    <button onclick="toggleComments({{ $post->id }})"
        class="px-4 py-2 rounded-sm gap-2  flex items-center justify-center font-semibold text-[#77797d]">
        <i class="bi bi-chat-left text-lg"></i>
        <span>Commenter</span>
    </button>


    <button onclick="shareUnsharePost({{ $post->id }})" id="share-btn-{{ $post->id }}"
        class="px-4 py-2 rounded-sm gap-2 flex items-center justify-center font-semibold {{ $post->shares->contains('sharer_id', Auth::id()) ? 'text-blue-500' : 'text-[#77797d]' }}">
        <i class="bi bi-share{{ $post->shares->contains('sharer_id', Auth::id()) ? '-fill' : '' }} text-lg"></i>
        <span>Partager</span>
    </button>
</div>
