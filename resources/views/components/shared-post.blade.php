<div class="max-w-2xl text-[#1c1e21] w-full mx-auto sm:px-6 lg:px-8">
    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex w-full flex-col p-2.5 text-gray-900 dark:text-gray-100 text-[15px] leading-[19px]">
            <div class="flex flex-col justify-between">
                <div class="flex gap-4 items-center">
                    <x-avatar :src="$share->sharer->profile_photo" :alt="$share->sharer->username" />
                    <div class="flex flex-col justify-center">
                        <h4 class="font-bold text-wrap">
                            {{ $share->sharer->username }} <span class="font-normal">a partagé une
                                publication.</span>
                        </h4>
                        <p
                            class="text-sm text-[#65686c] text-[0.8125rem] leading-[1.2308] font-semibold hover:cursor-pointer hover:underline">
                            @if ($share->updated_at)
                                {{ $share->updated_at->diffForHumans() }}
                            @else
                                {{ $share->created_at->diffForHumans() }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="mt-4 border w-fit rounded-md">
                    <div class="max-w-2xl text-[#1c1e21] w-full mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div
                                class="flex w-full flex-col p-2.5 text-gray-900 dark:text-gray-100 text-[15px] leading-[19px]">
                                <div class="flex justify-between">
                                    <div class="flex gap-4 items-center">
                                        <x-avatar :src="$share->post->user->profile_photo" :alt="$share->post->user->username" />
                                        <div class="flex flex-col justify-center">
                                            <h4 class="font-bold text-wrap">
                                                {{ $share->post->user->username }}
                                            </h4>
                                            <p
                                                class="text-sm text-[#65686c] text-[0.8125rem] leading-[1.2308] font-semibold hover:cursor-pointer hover:underline">
                                                @if ($share->post->updated_at)
                                                    {{ $share->post->updated_at->diffForHumans() }}
                                                @else
                                                    {{ $share->post->created_at->diffForHumans() }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative">
                                    <pre id="post-content-{{ $share->post->id }}"
                                        class="text-sm leading-[19px] py-[10px] font-sans line-clamp-4 transition-all duration-300 ease-in-out whitespace-pre-line">{{ $share->post->content }}</pre>
                                    @if (strlen($share->post->content) > 300)
                                        <button onclick="toggleReadMore({{ $share->post->id }})"
                                            class="text-blue-500 my-2 hover:underline"
                                            id="read-more-btn-{{ $share->post->id }}">
                                            En voir plus...
                                        </button>
                                    @endif
                                </div>

                                @if ($share->post->image)
                                    <img class="w-full rounded-md" src="{{ asset('storage/' . $share->post->image) }}"
                                        alt="Post image">
                                @endif

                                <div class="flex justify-between text-[#65688c] py-1.5">
                                    <span>
                                        {{ \App\Helpers\NumberFormatter::shorten($share->post->likes->count()) }}
                                        réaction{{ $share->post->likes->count() > 1 ? 's' : '' }}
                                    </span>
                                    <span>
                                        {{ $share->post->comments->count() }}
                                        commentaire{{ $share->post->comments->count() > 1 ? 's' : '' }},
                                        {{ $share->post->shares->count() }}
                                        partage{{ $share->post->comments->count() > 1 ? 's' : '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>
