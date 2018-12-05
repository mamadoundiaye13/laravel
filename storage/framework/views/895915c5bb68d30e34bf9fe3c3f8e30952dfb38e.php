<?php $__env->startSection('content'); ?>


    <!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/index.js')); ?>" defer></script>


    <!-- Style -->
    <link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
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
    <a href="<?php echo e(URL::action('ProduitController@index')); ?>">Retour à la liste</a>
</div>

<?php $__currentLoopData = $all_paniers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $panier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($panier->user_id == Auth::user()->id): ?>


        <?php if($panier->id == $all_paniers[0]->id): ?>
            <form method="POST" action="<?php echo e(route('commande', array($panier->id))); ?>" >  <!-- Appelons la fonction view -->
                <?php echo csrf_field(); ?>
                <div class="">
                    <div class="offset-md-10">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('commander')); ?>

                        </button>

                    </div>
                </div>
            </form>
        <?php endif; ?>


        <div class = "post-container">

        <div class="offset-0">
            <h1><strong><?php echo e($panier->titre); ?></strong></h1>
        </div>

        <!-- La Quanite du Panier -->
        <div class="offset-10">
            <label for="q">Quantité: </label>
            <select id="qt" name="q">
                <option value="1"><?php echo e($panier->quantite); ?></option>
            </select>
        </div>

        <div class="offset-0">
            <img src=<?php echo e($panier->photo); ?> alt="Photo_non_trouvé" width="100" height="100">
            <h4><Stong><?php echo e($panier->prix); ?> €</Stong></h4>
        </div>
        <form method="POST" action="<?php echo e(route('delete_panier', array($panier->id))); ?>" >  <!-- Appelons la fonction view -->
            <?php echo csrf_field(); ?>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-10">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('Supprimer')); ?>

                    </button>

                </div>
            </div>
        </form>

    </div>


<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>