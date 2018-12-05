@extends('layouts.app')

@section('content')


    <!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>


    <!-- Style -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>

<!-- Mon Code -->
<div class="card-img-top">
    <div class="offset-md-9" >
        <button type="submit"  title="5 paniers">
            <div class="text-secondary">
                Total Commande:
                <?php
                use App\Http\Controllers\PanierController;
                echo PanierController::totalCommande();
                ?>
                 €
            </div>

        </button>
    </div>
</div>


<div class="flex-sm-row">
    <a href="{{ URL::action('ProduitController@index') }}">Retour à la liste</a>
</div>

@foreach($all_paniers as $panier)
    @if($panier->user_id == Auth::user()->id)


        @if($panier->id == $all_paniers[0]->id)
            <form method="POST" action="{{ route('commande', array($panier->id)) }}" >  <!-- Appelons la fonction view -->
                @csrf
                <div class="">
                    <div class="offset-md-10">
                        <button type="submit" class="btn btn-primary">
                            {{ __('commander') }}
                        </button>

                    </div>
                </div>
            </form>
        @endif


        <div class = "post-container">

        <div class="offset-0">
            <h1><strong>{{ $panier->titre }}</strong></h1>
        </div>

        <!-- La Quanite du Panier -->
        <div class="offset-10">
            <label for="q">Quantité: </label>
            <select id="qt" name="q">
                <option value="1">{{$panier->quantite}}</option>
            </select>
        </div>

        <div class="offset-0">
            <img src={{$panier->photo}} alt="Photo_non_trouvé" width="100" height="100">
            <h4><Stong>{{$panier->prix}} €</Stong></h4>
        </div>
        <form method="POST" action="{{ route('delete_panier', array($panier->id)) }}" >  <!-- Appelons la fonction view -->
            @csrf
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-10">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Supprimer') }}
                    </button>

                </div>
            </div>
        </form>

    </div>


@endif
@endforeach



</body>
</html>
@endsection
