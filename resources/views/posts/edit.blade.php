<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier la publication') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        <div class="sm:w-full max-w-xl mx-2 sm:mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-2 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl font-bold text-center py-4 border-b border-gray-300/20">
                        Modifier la publication
                    </h1>
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data"
                        class="pt-4 flex flex-col gap-4">
                        @csrf
                        @method('PUT')

                        <div class="flex gap-4 items-center shadow-sm pb-4">
                            <x-avatar :src="$post->user->profile_photo" :alt="$post->user->username" />
                            <div class="flex flex-col justify-center">
                                <h4 class="font-bold text-wrap">
                                    {{ $post->user->username }}
                                </h4>
                            </div>
                        </div>

                        <div class="overflow-y-auto h-72">
                            <x-text-textarea id="content" name="content"
                                class="text-sm leading-[19.9px] border-none dark:bg-gray-900 focus:ring-0 dark:text-gray-300 w-full bg-none p-0 overflow-y-auto"
                                placeholder="Quoi de neuf, {{ $post->user->username }} ?">
                                {{ $post->content }}
                            </x-text-textarea>
                            <img id="post_img_preview" src="{{ asset('storage/' . $post->image) }}"
                                alt="{{ $post->user->username . "'s post" }}">
                        </div>

                        <label for="image"
                            class="text-md font-semibold px-4 py-2 border border-gray-300 bg-white shadow-sm rounded-md hover:cursor-pointer flex justify-between items-center">
                            <span>Ajouter à votre publication</span>
                            <i class="bi bi-image text-xl text-green-500 cursor-pointer"></i>
                        </label>
                        <input type="file" accept="image/*" id="image" name="image" class="hidden">

                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const preview = document.getElementById('post_img_preview');
                preview.src = evt.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
