<div class="card-body">
    <form action="{{route('create')}}" method="POST">
        @csrf
        <input type="text" name="libelle" class="@error('title') is-invalid @enderror">
        <input type="submit" value="Enregistrer">

        @error('libelle')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </form>
</div>
