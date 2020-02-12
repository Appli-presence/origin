@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('addProf') }}" method="POST" >

        @csrf

        <div style="display: flex">
            <div class="col-md-6">
                <label for="name">Nom Complet</label>
                <input type="text" name="name" id="name" required>
                <br>
                <label for="pwd">Mot de Passe</label>
                <input type="text" name="pwd" id="pwd" required>
            </div>
    
            
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <br>
    
                <label for="role">Promotion</label>
                <select name="role" id="role">
                    <option >PROFESSEUR</option>
                    <option >INTERVENANT</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Ajouter" class="float-right btn btn-primary">

    </form>
    <br><br>
    <table>
        <tr>
        <th>Nom </th>
        <th>Email</th>
        <th>Role</th>
        <th>Modifier</th>
        <th>Supprimer</th>
        </tr>

        @foreach ($users as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->role  }}</td>
            <td>
                <form action="{{route('updateProfForm',['id'=>$item->id])}}">
                    <input type="submit" value="Modifier">
                </form>
            </td> 
            <td>
                <form action="{{route('deleteProf',['id'=>$item->id])}}" method="post">
                    @csrf
                    <input type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
