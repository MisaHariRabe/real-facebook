<!-- Send Message Form -->
<h3>Envoyer un message</h3>
<form action="{{ route('messages.store') }}" method="POST">
    @csrf
    <div>
        <label for="receiver_id">Receiver:</label>
        <select name="receiver_id" required>
            @foreach ($users as $user)
                @if ($user->id != Auth::id())
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div>
        <label for="content">Message:</label>
        <textarea name="content" required></textarea>
    </div>

    <button type="submit">Envoyer</button>
</form>
