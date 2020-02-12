@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table>
                        <thread>
                            <th>Cours</th>
                            <th>Promotion</th>
                            <th></th>
                        </thread>
                        @foreach($cours as $cour)
                            <tr>

                            <td>{{ $cour->libelle }}</td>
                            <td>{{ $cour->promo }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaledit">
                                    Faire l'appel
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

                                                <table>
                                                    <thead>
                                                        <th></th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Presence</th>
                                                    </thead>
                                                    @foreach ($param as $value)
                                                    @if ($cour->promoId=="3")
                                                        <tr>
                                                            <td>{{$value->etudiantId}}</td>
                                                            <td>{{$value->nom}}</td>
                                                            <td>{{$value->prenom}}</td>
                                                            <td>
                                                                <input type="checkbox" aria-label="Checkbox for following text input" active>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @endforeach
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="button" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
