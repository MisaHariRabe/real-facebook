<h3>Créer un groupe</h3>

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <label for="name">Nom du groupe</label>
    <input type="text" name="name" id="name" required>
    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>
    <label for="privacy">Visibilité</label>
    <select name="privacy" id="privacy">
        <option value="public">Public</option>
        <option value="private">Privé</option>
    </select>
    <button type="submit">Créer le groupe</button>
</form>
