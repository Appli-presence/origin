@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Promotions</div>
                @foreach($promotions as $promotion)
                <div class="card-body">
                    {{ $promotion->libelle }}
                    <a href="/promotion/update-promo/{{ $promotion->promotionId }}">Modifier</a>
                    <a href="/promotion/delete/{{ $promotion->promotionId }}">Supprimer</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection