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
    <h3>{{ 'La Commande est bien ajouté!' }}</h3>
</div>
<div class="flex-sm-row">
    <a href="{{ URL::action('ProduitController@index') }}">Refaire une Commande</a>
</div>
</body>
</html>
@endsection
