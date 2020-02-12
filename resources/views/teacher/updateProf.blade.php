@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('updateProf') }}" method="POST">

        @csrf

        <input type="hidden" name="id" id="id" value="{{$user->id}}">

        <label for="name">Nom Complet</label>
        <input type="text" name="name" id="name" value="{{$user->name}}">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{$user->email}}">

        <br>

        <label for="pwd">Mot de Passe</label>
        <input type="text" name="pwd" id="pwd" >

        <label for="role">Role</label>
        <select name="role" id="role">
            @if($user->role == 'PROFESSEUR')
            <option selected >PROFESSEUR</option>
            <option >INTERVENANT</option>
            @else
            <option  >PROFESSEUR</option>
            <option selected>INTERVENANT</option>
            @endif
        </select>

        <br>

        <input type="submit" value="Modifier">

    </form>

    </div>
@endsection