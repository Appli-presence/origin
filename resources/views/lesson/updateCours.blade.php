@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('updateCours') }}" method="POST">

        @csrf
    <input type="hidden" name="id" id="id" value="{{ $list->coursId }}">

        <label for="libelle">Nom du cours</label>
        <input type="text" name="libelle" id="libelle" value="{{ $list->libelle }}" required>

        <label for="userId">Nom de l'enseignant</label>
        <select name="userId" id="userId">
            @foreach ($user as $item)
            @if ($item->id==$list->userId)
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @endif
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <label for="promoId">Promotion</label>
        <select name="promoId" id="promoId">
            @foreach ($promotion as $item)
            @if ($item->promotionId==$list->promoId)
                <option value="{{ $item->promotionId }}" selected>{{ $item->libelle }}</option>
            @endif
                <option value="{{ $item->promotionId }}">{{ $item->libelle }}</option>
            @endforeach
        </select>

        <!-- <label for="date">Date</label>
        <input type="date" name="date" id="date" value="{{ date('Y-m-d',strtotime($list->debut )) }}">

        <label for="h_debut">Heure du début du cours</label>
        <input type="time" name="h_debut" id="h_debut" value="{{ date('H:i',strtotime($list->debut )) }}">

        <label for="h_fin">Heure de fin du cours</label>
        <input type="time" name="h_fin" id="h_fin" value="{{ date('H:i',strtotime($list->fin ))}}"> -->

        <input type="submit" value="Modifier le cours">

    </form>
</div>
@endsection
