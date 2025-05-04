<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Toutes les notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse($notifications as $notification)
                <div
                    class="bg-white dark:text-white dark:bg-gray-800 p-4 rounded shadow flex justify-between items-center">
                    <div>
                        <strong>{{ $notification->type }}</strong>
                        <p>{{ $notification->data }}</p>
                        <div class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>

                    @if (!$notification->is_read)
                        <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Marquer comme lu
                            </button>
                        </form>
                    @else
                        <span class="text-green-500 text-sm">Lue</span>
                    @endif
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-400">Aucune notification</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
