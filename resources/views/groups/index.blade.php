<x-app-layout>
    <x-slot name="header">
        <h2 h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Groups') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4">
        @foreach ($groups as $group)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h4>
                            <a href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a>
                        </h4>
                        <p>{{ $group->description }}</p>
                        <p>Privacy: {{ $group->privacy }}</p>
                        <p>Owner: {{ $group->owner->name }}</p>
                        @if ($group->members->contains(Auth::id()))
                            <form action="{{ route('groups.leave', $group->id) }}" method="POST">
                                @csrf
                                <button type="submit">Leave Group</button>
                            </form>
                        @else
                            <form action="{{ route('groups.join', $group->id) }}" method="POST">
                                @csrf
                                <button type="submit">Join Group</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
