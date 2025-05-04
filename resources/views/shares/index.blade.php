<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between">
            <h2 h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Shares') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        @foreach ($posts as $post)
            <x-shared-post :share="$post" />
        @endforeach
    </div>
</x-app-layout>
