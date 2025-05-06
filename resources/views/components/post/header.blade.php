<div class="flex justify-between">
    <div class="flex gap-4 items-center">
        <x-avatar :src="$post->user->profile_photo" :alt="$post->user->username" />
        <div class="flex flex-col justify-center">
            <h4 class="font-bold text-wrap">
                {{ $post->user->username }}
            </h4>
            <p
                class="text-sm text-[#65686c] text-[0.8125rem] leading-[1.2308] font-semibold hover:cursor-pointer hover:underline">
                @if ($post->updated_at)
                    {{ $post->updated_at->diffForHumans() }}
                @else
                    {{ $post->created_at->diffForHumans() }}
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
