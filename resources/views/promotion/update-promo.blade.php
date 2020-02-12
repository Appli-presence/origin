@extends('layouts.app')

@section('content')

<form action="{{ route('edit', ['id' => $promotion->promotionId]) }}" method="POST">
    @csrf
    <input type="text" name="libelle" value="{{ $promotion->libelle }}">
    <input type="submit" value="Envoyer">
</form>

@endsection
