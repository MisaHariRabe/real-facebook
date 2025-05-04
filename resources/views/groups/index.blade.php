<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between">
            <h2 h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tous les groupes') }}
            </h2>
            <a href="{{ route('groups.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">
                Créer un groupe
            </a>
        </div>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        @foreach ($groups as $group)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <h4 class="font-semibold">
                                {{ $group->name }} <span class="font-normal">-
                                    {{ $group->privacy === 'private' ? 'Privé' : 'Public' }}</span>
                            </h4>
                            <p class="text-gray-400 text-sm font-semibold">Créé par {{ $group->owner->name }}</p>
                        </div>

                        <div class="text-sm">
                            <p class="mb-4">{{ $group->description }}</p>
                            @if ($group->members->contains(Auth::id()))
                                <form action="{{ route('groups.leave', $group->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white font-semibold py-2 px-4 rounded-lg">
                                        Quitter le groupe
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('groups.join', $group->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg">
                                        Rejoindre le groupe
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
