@if ($post->image)
    <img class="w-full rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="Post image">
@endif
