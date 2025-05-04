<div class="max-w-3xl w-full mx-auto sm:px-6 lg:px-8">
    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex w-full flex-col gap-2 p-6 text-gray-900 dark:text-gray-100">
            <div class="flex justify-between">
                <div class="flex gap-4 items-center">
                    <x-avatar :src="$post->user->profile_photo" :alt="$post->user->username" />
                    <div class="flex flex-col justify-center">
                        <h4 class="font-bold text-wrap">
                            {{ $post->user->username }}
                        </h4>
                        <p class="text-sm text-gray-400">
                            @if ($post->updated_at)
                                {{ $post->updated_at }}
                            @else
                                {{ $post->created_at }}
                            @endif
                        </p>
                    </div>
                </div>

                @if ($post->user_id == Auth::id())
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="dark:bg-gray-900 rounded-full h-[48px] w-[48px]">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <form action="{{ route('posts.delete', $post) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="flex gap-2 items-center w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                        <i class="bi bi-trash2 text-lg"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                                @can('update', $post)
                                    <x-dropdown-link :href="route('posts.edit', $post)">
                                        <i class="bi bi-pen text-lg"></i>
                                        <span>Edit</span>
                                    </x-dropdown-link>
                                @endcan
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
            </div>
            <div class="relative">
                <p id="post-content-{{ $post->id }}"
                    class="line-clamp-4 transition-all duration-300 ease-in-out whitespace-pre-line">
                    {{ $post->content }}
                </p>
                @if (strlen($post->content) > 300)
                    <button onclick="toggleReadMore({{ $post->id }})" class="text-blue-500 mt-2 hover:underline"
                        id="read-more-btn-{{ $post->id }}">
                        See more...
                    </button>
                @endif
            </div>

            @if ($post->image)
                <img class="w-full rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="Post image">
            @endif

            <div class="flex justify-between">
                <span>
                    {{ $post->likes->count() }} like{{ $post->likes->count() > 1 ? 's' : '' }}
                </span>
                <span>
                    {{ $post->comments->count() }} comment{{ $post->comments->count() > 1 ? 's' : '' }}
                </span>
            </div>

            <div class="border-t border-b border-gray-600 py-2 flex gap-4 justify-evenly items-center">

                <form
                    action="{{ $post->likes->contains('user_id', Auth::id()) ? route('likes.destroy', $post->id) : route('likes.store', $post->id) }}"
                    method="POST">
                    @csrf
                    @if ($post->likes->contains('user_id', Auth::id()))
                        @method('DELETE')
                    @endif

                    <button type="submit"
                        class="flex px-4 py-2 rounded-sm gap-2 {{ $post->likes->contains('user_id', Auth::id()) ? 'text-blue-500' : '' }}">
                        <i class="bi bi-hand-thumbs-up-fill text-lg"></i>
                        <span>{{ $post->likes->contains('user_id', Auth::id()) ? 'Liked' : 'Like' }}</span>
                    </button>
                </form>

                <x-secondary-button onclick="toggleComments({{ $post->id }})" class="flex gap-2">
                    <i class="bi bi-chat-left text-lg"></i>
                    <span>Comment</span>
                </x-secondary-button>
            </div>
            <div class="mt-4 w-full hidden" id="comments-container-{{ $post->id }}">
                @include('posts.show')
            </div>
            <form action="{{ route('comments.store', $post) }}" method="POST" class="w-full flex flex-row gap-4">
                @csrf

                <x-text-textarea name="content" class="w-full placeholder:text-gray-300" required
                    placeholder="Write a comment..."></x-text-textarea>
                <x-secondary-button type="submit">
                    <i class="bi bi-send text-2xl"></i>
                </x-secondary-button>
            </form>
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
            button.textContent = 'See more...';
        } else {
            button.textContent = 'See less';
        }
    }
</script>
