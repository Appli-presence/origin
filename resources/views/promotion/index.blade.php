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
                            <thread>
                                <th>Promotions</th>
                                <th></th>
                                <th></th>
                            </thread>
                            @foreach($promotions as $promotion)
                        <tr>
                            <td>{{ $promotion->libelle }}</td>
                            <td><a href="/promotion/update-promo/{{ $promotion->promotionId }}">Modifier</a></td>
                            <td><a href="/promotion/delete/{{ $promotion->promotionId }}">Supprimer</a></td>
                        </tr>
                            @endforeach
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
