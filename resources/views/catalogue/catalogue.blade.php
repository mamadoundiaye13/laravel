@extends('layouts.app')

@section('content')


    <!doctype html>
    <html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->
        <script src="{{ asset('js/index.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Style -->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    </head>
    <body onload="pop_up({{Auth::user()->id}})">

        @foreach($all_produits as $produit)
            <div class="position_cata">
                <div class = "post-container">
                    <h3>{{ $produit->titre }}</h3>
                    <img src= {{ $produit->photo}} alt="photo_non_affiché" width="200" height="200">

                    <form method="POST" action="{{ route('profile', array($produit->id)) }}" >  <!-- Appelons la fonction view -->
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Description du Produit') }}
                                </button>

                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('paniersForm', array($produit->id)) }}">
                        @csrf
                        <div class="form-group row mb-11">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Achat Directement') }}
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>


        @endforeach



    </body>
    </html>
@endsection
