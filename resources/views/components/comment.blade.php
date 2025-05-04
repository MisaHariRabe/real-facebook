<div class="flex gap-2 mb-2">
    <x-avatar :src="$comment->user->profile_photo" :alt="$comment->user->username" size="small" />

    <div class="w-fit py-2 px-3 rounded-[1.125rem] bg-gray-100 dark:bg-gray-900 dark:text-gray-300">
        <p class="text-wrap text-[#080809] font-semibold leading-[1.2308] text-[0.8125rem]">
            {{ $comment->user->username }}</p>
        <pre class="font-sans font-normal text-wrap leading-[1.3333] text-[0.9375rem] m-0">{{ $comment->content }}</pre>
    </div>

    <div class="self-center">
        <button onclick="alert('Comment with id {{ $comment->id }} liked by {{ Auth::user()->username }}')"
            class="inline-flex justify-center items-center p-0 w-8 h-8 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-900 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            <i class="bi bi-hand-thumbs-up"></i>
        </button>
    </div>

    @if ($comment->user_id === Auth::id())
        <!-- Comment Functionnality Dropdown -->
        <div class="self-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex justify-center items-center p-0 w-8 h-8 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-900 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <i class="bi bi-three-dots"></i>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this comment?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="p-4">Delete</button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @endif
</div>
