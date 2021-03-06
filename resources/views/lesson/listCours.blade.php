@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cours</div>
                    <div class="card-body">
                        <form class="form-group" action="{{ route('addCours') }}" method="POST">

                            @csrf
                    
                            <label for="libelle">Nom du cours</label>
                            <input  class="form-control" type="text" name="libelle" id="libelle" required>
                    
                            <label for="userId">Nom de l'enseignant</label>
                            <select  class="form-control" name="userId" id="userId">
                                @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                    
                            <label for="promoId">Promotion</label>
                            <select  class="form-control" name="promoId" id="promoId">
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
                    
                        -->     <input class="btn btn-primary btn-lg" type="submit" value="Ajouter le cours">
                        </form>
                        <hr>
                        <br><br>
                        <table class="table" >
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
                                <td>
                                     @if($item->debut != NULL)
                                         {{ date('Y-m-d',strtotime($item->debut)) }}
                                     @else
                                           0000-00-00
                                     @endif
                                </td>
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
            </div>
        </div>
    </div>


    

</div>
@endsection
