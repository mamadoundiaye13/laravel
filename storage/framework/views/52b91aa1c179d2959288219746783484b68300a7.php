<?php $__env->startSection('content'); ?>
    <!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
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
    <a href="<?php echo e(URL::action('PanierController@index')); ?>">Retour à la liste</a>
    <h1><?php echo e($post->titre); ?></h1>
    <p><?php echo e($post->prix); ?></p>
    <i><?php echo e($post->catalogue_id); ?></i>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>