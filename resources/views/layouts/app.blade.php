<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-commerce</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

            <div class="container">

                <!-- Logo du site -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://raw.githubusercontent.com/mamadoundiaye13/Libmy-Commerce-APAE-ETNA/master/Skype_Picture.jpeg" alt="Logo_Africa Store" title="Accueil" id="logo"/ >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

                <!-- Panier du site-->

                <div class="panier">
                    <form method="POST" action="{{ action('PanierController@index') }}">
                        @csrf
                        <div class="col-md-12">
                            <div class="offset-md-11" >
                                <button type="submit"  title="panier">
                                    <p>
                                        <?php
                                        use App\Http\Controllers\PanierController;
                                        use Illuminate\Support\Facades\Auth;

                                        if(Auth::user()){
                                            echo PanierController::compteProduitsPaniers();
                                        }
                                        ?>
                                        <img src={{"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfscG5Zumfr_bHxx9aFyhe1Aoeo0KPZRw1LHq7aKsYrHmBcxaSZg"}} alt="panier_non_affiche">
                                    </p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<!-- Footer du  site -->
<footer>
    <div class="mentionscgv">
        <a class="navbar-brand" href="{{ url('/') }}" title="Follow me on Twitter !" target="_blank"><img src="https://raw.githubusercontent.com/mamadoundiaye13/Libmy-Commerce-APAE-ETNA/master/icone_twitter.png" /></a>
        <a class="navbar-brand" href="{{ url('/') }}" title="Follow me on Facebook !" target="_blank" ><img src="https://raw.githubusercontent.com/mamadoundiaye13/Libmy-Commerce-APAE-ETNA/master/icone_facebook.png" /></a>
    </div>
</footer>

</html>
