<div id="popupForm" 
style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
    <h3>Modifier le Besoin</h3>

    <form action="{{ route('besoin.update', $besoin->id) }}" method="POST">
        @csrf
        @method('POST')

        <label for="ref">Réf :</label>
        <input type="text" name="ref" value="{{ $besoin->id }}" readonly>

        <label for="idMarche">Marché :</label>
        <input type="text" name="idMarche" value="{{ $marcheActif->id }}" readonly>

        <label for="date">Date :</label>
        <input type="date" name="date" required>

        <button type="submit">Enregistrer</button>
        <button type="button" onclick="closePopup()">Annuler</button>
</form>
</div>