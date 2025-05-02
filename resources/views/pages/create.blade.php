<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New Page') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data"
                        class="flex flex-col gap-4">
                        @csrf

                        <div>
                            <label for="name" class="block mb-1">Page Name:</label>
                            <input type="text" name="name" class="w-full bg-gray-600 border rounded p-2" required>
                        </div>

                        <div>
                            <label for="description" class="block mb-1">Page Description:</label>
                            <textarea name="description" class="w-full bg-gray-600 border rounded p-2"></textarea>
                        </div>

                        <div>
                            <label for="profile_photo" class="block mb-1">Profile Photo:</label>
                            <input type="file" name="profile_photo" class="w-full bg-gray-600 border rounded p-2">
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">Create Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
