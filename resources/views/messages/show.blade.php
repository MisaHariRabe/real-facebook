<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between">
            <h2 h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tous les messages') }}
            </h2>
        </div>
    </x-slot>

    <form method="GET" action="{{ url('/messages') }}">
        <label for="receiver_id" class="block font-semibold mb-1">Choisir un destinataire :</label>
        <select name="receiver_id" id="receiver_id" class="border rounded p-2 mb-4"
            onchange="window.location.href='/messages/' + this.value;">
            <option disabled selected>-- Choisir un utilisateur --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $userId ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded p-4 max-h-[60vh] overflow-y-auto space-y-2">
            @forelse ($messages as $message)
                <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div
                        class="px-4 py-2 rounded-lg 
                {{ $message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-black' }}">
                        <p class="text-sm">{{ $message->content }}</p>
                        <p class="text-xs text-right mt-1">{{ $message->created_at->format('H:i') }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">Aucun message pour l’instant.</p>
            @endforelse
        </div>

        <form action="{{ route('messages.store') }}" method="POST" class="mt-4 flex flex-col gap-2">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $userId }}">
            <textarea name="content" class="w-full border rounded px-3 py-2" rows="3" placeholder="Écris un message..."
                required></textarea>
            <button type="submit" class="self-end bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Envoyer
            </button>
        </form>
    </div>

</x-app-layout>
