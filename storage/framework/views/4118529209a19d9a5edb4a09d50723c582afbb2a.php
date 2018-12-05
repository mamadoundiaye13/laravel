<?php $__env->startSection('content'); ?>


    <!doctype html>
    <html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/index.js')); ?>" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Style -->
        <link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
    </head>
    <body onload="pop_up(<?php echo e(Auth::user()->id); ?>)">

        <?php $__currentLoopData = $all_produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="position_cata">
                <div class = "post-container">
                    <h3><?php echo e($produit->titre); ?></h3>
                    <img src= <?php echo e($produit->photo); ?> alt="photo_non_affiché" width="200" height="200">

                    <form method="POST" action="<?php echo e(route('profile', array($produit->id))); ?>" >  <!-- Appelons la fonction view -->
                        <?php echo csrf_field(); ?>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Description du Produit')); ?>

                                </button>

                            </div>
                        </div>
                    </form>

                    <form method="POST" action="<?php echo e(route('paniersForm', array($produit->id))); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row mb-11">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Achat Directement')); ?>

                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </body>
    </html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>