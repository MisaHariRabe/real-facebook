<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New Post') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
                        class="flex flex-col gap-4">
                        @csrf

                        <div>
                            <label for="content" class="block mb-1">Content</label>
                            <x-text-textarea id="content" name="content"
                                class="w-full bg-gray-600 border rounded p-2"></x-text-textarea>
                        </div>

                        <div>
                            <label for="image" class="block mb-1">Image</label>
                            <input type="file" id="image" name="image"
                                class="w-full bg-gray-600 border rounded p-2">
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
