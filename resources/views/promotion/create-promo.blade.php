@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Promotions</div>

                <div class="card-body">
                    <form action="{{route('create')}}" method="POST">
                        @csrf
                        <input type="text" name="libelle" class="@error('title') is-invalid @enderror">
                        <input type="submit" value="Enregistrer">

                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection