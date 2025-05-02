<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New Group') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('groups.store') }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <div>
                            <label for="name" class="block mb-1">Group Name</label>
                            <input type="text" name="name" id="name"
                                class="w-full bg-gray-600 border rounded p-2" required>
                        </div>
                        <div>
                            <label for="description" class="block mb-1">Description</label>
                            <textarea name="description" id="description" class="w-full bg-gray-600 border rounded p-2"></textarea>
                        </div>
                        <div>
                            <label for="privacy" class="block mb-1">Privacy</label>
                            <select name="privacy" id="privacy" class="w-full bg-gray-600 border rounded p-2">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">Create
                            Group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
