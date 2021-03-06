<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>E-commerce</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/index.js')); ?>" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

            <div class="container">

                <!-- Logo du site -->
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="https://raw.githubusercontent.com/mamadoundiaye13/Libmy-Commerce-APAE-ETNA/master/Skype_Picture.jpeg" alt="Logo_Africa Store" title="Accueil" id="logo"/ >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <li class="nav-item">
                                <?php if(Route::has('register')): ?>
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                <?php endif; ?>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Panier du site-->

                <div class="panier">
                    <form method="POST" action="<?php echo e(action('PanierController@index')); ?>">
                        <?php echo csrf_field(); ?>
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
                                        <img src=<?php echo e("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfscG5Zumfr_bHxx9aFyhe1Aoeo0KPZRw1LHq7aKsYrHmBcxaSZg"); ?> alt="panier_non_affiche">
                                    </p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </nav>


        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>

<!-- Footer du  site -->
<footer>
    <div class="mentionscgv">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>" title="Follow me on Twitter !" target="_blank"><img src="https://raw.githubusercontent.com/mamadoundiaye13/Libmy-Commerce-APAE-ETNA/master/icone_twitter.png" /></a>
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>" title="Follow me on Facebook !" target="_blank" ><img src="https://raw.githubusercontent.com/mamadoundiaye13/Libmy-Commerce-APAE-ETNA/master/icone_facebook.png" /></a>
    </div>
</footer>

</html>
