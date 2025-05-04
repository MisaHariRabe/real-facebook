<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between">
            <h2 h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Toutes les publications') }}
            </h2>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">
                Créer une publication
            </a>
        </div>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
    </div>
</x-app-layout>
