@extends('layouts.app')

@section('content')

    <!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- styles -->
    <link href="./css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class = "post-container">
        <h3>{{ $produits->titre }}</h3>
        <img src= {{ $produits->photo}} alt="photo_non_affiché" width="200" height="200">
        <p>{{ $produits->description }}</p>
        <h4>{{$produits->prix}} €</h4>

        <div class="text-right">
            <div class="col-md-10">
                {{$produits->stock_restant}} produits restants
            </div>
        </div>


            <div class = "post-container">
                <form method="POST" action="{{ route('panier_des', array($produits->id)) }}">
                    @csrf
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Achat Directement') }}
                            </button>

                        </div>
                    </div>
                </form>

            </div>


    </div>
    <div class="flex-sm-row">
        <a href="{{ URL::action('ProduitController@index') }}">Retour à la liste</a>
    </div>
</body>
</html>
@endsection
