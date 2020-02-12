@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('addCours') }}" method="POST">

        @csrf

        <label for="libelle">Nom du cours</label>
        <input type="text" name="libelle" id="libelle">

        <label for="userId">Nom de l'enseignant</label>
        <select name="userId" id="userId">
            @foreach ($user as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <label for="promoId">Promotion</label>
        <select name="promoId" id="promoId">
            @foreach ($promotion as $item)
        <option value="{{ $item->promotionId }}">{{ $item->libelle }}</option>
            @endforeach
        </select>

    <!--     <label for="date">Date</label>
        <input type="date" name="date" id="date">

        <label for="h_debut">Heure du début du cours</label>
        <input type="time" name="h_debut" id="h_debut">

        <label for="h_fin">Heure de fin du cours</label>
        <input type="time" name="h_fin" id="h_fin">

    -->     <input type="submit" value="Ajouter le cours">

    </form>
</div>
@endsection
