<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Pages') }}
            </h2>
            <a href="{{ route('pages.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">Create New
                Page</a>
        </div>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        @foreach ($pages as $page)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('pages.show', $page->id) }}">{{ $page->name }}</a>
                        <p>{{ $page->description }}</p>
                        <a href="{{ route('pages.edit', $page->id) }}">Edit</a>
                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
