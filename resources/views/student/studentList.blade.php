@extends('layouts.app')

@section('content')
<div class="container">
    <div style="display: flex;">
        <div id='addStudent' class="col-md-6">
            <form action="./student/add" method="POST">
                @csrf
                <input type="text" name="nom" placeholder="Nom" class="col-md-6" required/>
                <input type="text" name="prenom" placeholder="Prénom" class="col-md-6" required/>
                <input type="submit" value="Ajouter" class='offset-md-5 btn btn-primary' >
            </form>
        </div>
        <div id='linkStudentPromo' class="col-md-6">
            <form action="./student/linkPromo" method="POST">
                @csrf
                <select class="col-md-6" name='studentId'>
                    @foreach ($param['student'] as $value)
                        <option value="{{$value->etudiantId}}">{{$value->nom}} {{$value->prenom}}</option>
                    @endforeach
                </select>
                <select class="col-md-6" name='promoId'>
                    @foreach ($param['promo'] as $value)
                        <option value="{{$value->promotionId}}">{{$value->libelle}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Ajouter lien" class='offset-md-5 btn btn-primary'>
            </form>
        </div>
    </div>

    <table>
        <thead>
            <th></th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Promotion</th>
            <th></th>
            <th></th>
        </thead>
        
    @foreach ($param['student'] as $value)
        <tr>
            <td>{{$value->etudiantId}}</td>
            <td>{{$value->nom}}</td>
            <td>{{$value->prenom}}</td>
            <td>{{$value->libelle}}</td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaledit">
                    Modifier
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modaleditTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="./student/update" method='POST'>
                                @csrf
                                <input type="hidden" name="etudiantId" value="{{$value->etudiantId}}"/>
                                <input type="text" name="nom" placeholder="Nom" value="{{$value->nom}}" class='col-md-12' required/>
                                <input type="text" name="prenom" placeholder="Prénom" value="{{$value->prenom}}" class='col-md-12' required/>
                                <input type="submit" value="Modifier" value="" class='float-right btn btn-secondary'>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <!--<button type="button" class="btn btn-primary">Enregistrer</button>-->
                        </div>
                    </div>
                    </div>
                </div>
            </td>
            <td><a href="./student/delete/{{$value->etudiantId}}"><button class="btn btn-primary">Supprimer</button></a></td>
        </tr>
    @endforeach
    </table>

    <hr>

    <div>
        
    </div>

</div>
@endsection