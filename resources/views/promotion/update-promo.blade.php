<form action="{{ route('edit', ['id' => $promotion->promotionId]) }}" method="POST">
    @csrf
    <input type="text" name="libelle" required>
    <input class="btn btn-primary" type="submit" value="Envoyer">
</form>
