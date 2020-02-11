@extends('layouts.app')

@section('content')
<div class="container">
    <div id='addStudent'>
        <form action="./student/add" method="POST">
            @csrf
            <input type="text" name="nom" placeholder="Nom" class='col-md-12'/>
            <input type="text" name="prenom" placeholder="Prénom" class='col-md-12'/>
            <input type="submit" value="Ajouter" class='offset-md-11'>
        </form>
    </div>
    <table>
        <thead>
            <th></th>
            <th>Nom</th>
            <th>Prénom</th>
            <th></th>
        </thead>
    @foreach ($param as $value)
        <tr>
            <td>{{$value->etudiantId}}</td>
            <td>{{$value->nom}}</td>
            <td>{{$value->prenom}}</td>
            <td><a href="./student/delete/{{$value->etudiantId}}"><button>Supprimer</button></a></td>
        </tr>
    @endforeach
    </table>

    <hr>

    <div>
        <form action="./student/update" method='POST'>
            @csrf
            <select name="etudiantId">
                @foreach ($param as $value)
                    <option value="{{$value->etudiantId}}">{{$value->nom}} {{$value->prenom}}</option>
                @endforeach
            </select>
            
            <input type="text" name="nom" placeholder="Nom" class='col-md-12'/>
            <input type="text" name="prenom" placeholder="Prénom" class='col-md-12'/>
            <input type="submit" value="Modifier" class='offset-md-11'>
        </form>
    </div>

</div>
@endsection