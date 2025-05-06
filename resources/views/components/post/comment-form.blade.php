<form action="{{ route('comments.store', $post) }}" method="POST" class="w-full flex flex-row gap-4 h-[45px] mt-3">
    @csrf

    <x-text-textarea name="content" class="w-full placeholder:text-gray-500 bg-[#f0f2f5] rounded-full" required
        placeholder="Write a comment..."></x-text-textarea>
    <x-secondary-button type="submit" class="p-3.5">
        <i class="bi bi-send text-lg leading-[1em] italic tracking-[0px] [word-spacing:0px]"></i>
    </x-secondary-button>
</form>
