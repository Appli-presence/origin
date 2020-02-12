<div class="card-body">
    <form action="{{route('create')}}" method="POST">
        @csrf
        <input type="text" name="libelle" class="@error('title') is-invalid @enderror" placeholder="Nom promotion" required>
        <input type="submit" value="Enregistrer" class="btn btn-primary">

        @error('libelle')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </form>
</div>
