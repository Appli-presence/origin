@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Promotions</div>
                <div class="card-body">
                    <table>
                        @foreach($promotions as $promotion)
                            <td>
                                <tr>{{ $promotion->libelle }}</tr>
                                <tr>
                                    <a href="/promotion/update-promo/{{ $promotion->promotionId }}">Modifier</a>
                                </tr>
                                <tr>
                                    <a href="/promotion/delete/{{ $promotion->promotionId }}">Supprimer</a>
                                </tr>
                            </td>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
