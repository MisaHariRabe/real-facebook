<div class="max-w-2xl text-[#1c1e21] w-full mx-auto sm:px-6 lg:px-8">
    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex w-full flex-col p-2.5 text-gray-900 dark:text-gray-100 text-[15px] leading-[19px]">
            @include('components.post.header')
            @include('components.post.content')
            @include('components.post.image')
            @include('components.post.interactions')
            @include('components.post.buttons')

            <div class="mt-4 w-full hidden" id="comments-container-{{ $post->id }}">
                @include('posts.show')
            </div>

            @include('components.post.comment-form')
        </div>
    </div>
</div>

<script>
    function toggleComments(postId) {
        const container = document.getElementById(`comments-container-${postId}`);
        container.classList.toggle('hidden');
    }

    function toggleReadMore(postId) {
        const content = document.getElementById(`post-content-${postId}`);
        const button = document.getElementById(`read-more-btn-${postId}`);

        content.classList.toggle('line-clamp-4');

        if (content.classList.contains('line-clamp-4')) {
            button.textContent = 'En voir plus...';
        } else {
            button.textContent = 'Voir moins';
        }
    }

    async function togglePostAction({
        postId,
        type,
        isActiveClass,
        activeIcon,
        inactiveIcon,
        urlAction,
        countKey
    }) {
        const btn = document.getElementById(`${type}-btn-${postId}`);
        const countEl = document.getElementById(`${type}-count-${postId}`);
        const hasAction = btn.classList.contains(isActiveClass);
        const url = hasAction ? `/posts/${postId}/${urlAction[1]}` : `/posts/${postId}/${urlAction[0]}`;
        const method = hasAction ? 'DELETE' : 'POST';

        try {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const data = await response.json();
            if (!response.ok) throw data;

            // Mise à jour du bouton
            btn.classList.toggle(isActiveClass);
            btn.classList.toggle('text-[#77797d]');
            const icon = btn.querySelector('i');
            icon.classList.toggle(inactiveIcon);
            icon.classList.toggle(activeIcon);

            // Mise à jour du compteur
            countEl.textContent =
                `${data[countKey]} ${ ((type === "share") ? "commentaire" : "réaction") + ((data.shares_count > 1) ? 's' : '')}`;
        } catch (err) {
            console.error(err);
            alert(err.error || 'Une erreur est survenue.');
        }
    }

    function likeUnlikePost(postId) {
        togglePostAction({
            postId,
            type: 'like',
            isActiveClass: 'text-blue-500',
            activeIcon: 'bi-hand-thumbs-up-fill',
            inactiveIcon: 'bi-hand-thumbs-up',
            urlAction: ['like', 'like'],
            countKey: 'likes_count'
        });
    }

    function shareUnsharePost(postId) {
        togglePostAction({
            postId,
            type: 'share',
            isActiveClass: 'text-blue-500',
            activeIcon: 'bi-share-fill',
            inactiveIcon: 'bi-share',
            urlAction: ['share', 'unshare'],
            countKey: 'shares_count'
        });
    }
</script>
