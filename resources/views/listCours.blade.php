@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('addCoursForm')}}">
        <input type="submit" value="Ajouter">
    </form>
    <table border="1">
        <tr>
        <th>Nom du cours</th>
        <th>Nom du professeur</th>
        <th>Nom de la promotion</th>
        <th>Date</th>
        <th>Heure du début</th>
        <th>Heure de fin</th>
        <th>Modifier</th>
        <th>Supprimer</th>
        </tr>

        @foreach ($list as $item)
        <tr>
            <td>{{ $item->libelle }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->promo }}</td>
            <td>{{ date('Y-m-d',strtotime($item->debut ))}}</td>
            <td>{{ date('H:i',strtotime($item->debut )) }}</td>
            <td>{{ date('H:i',strtotime($item->fin )) }}</td>
            <td>
                <form action="{{route('updateCoursForm',['id'=>$item->coursId])}}">
                    <input type="submit" value="Modifier">
                </form>
            </td>
            <td>
                <form action="{{route('deleteCours',['id'=>$item->coursId])}}" method="post">
                    @csrf
                    <input type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
