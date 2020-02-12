@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Promotions</div>
                <div class="card-body">
                    @include('/promotion/create-promo')

                </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <th>Promotions</th>
                                <th></th>
                                <th></th>
                            </thead>
                            @foreach($promotions as $promotion)
                        <tr>
                            <td>{{ $promotion->libelle }}</td>
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
                                            @include('/promotion/update-promo')
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <!--<button type="button" class="btn btn-primary">Enregistrer</button>-->
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="/promotion/delete/{{ $promotion->promotionId }}">Supprimer</a>
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
