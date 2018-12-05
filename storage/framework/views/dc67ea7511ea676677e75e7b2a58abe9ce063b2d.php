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
    <link href="<?php echo e(URL::asset('css/custom.css')); ?>" rel="stylesheet" type="text/css">
</head>
<body>
<a href="<?php echo e(URL::action('PostController@index')); ?>">Retour à la liste</a> - <a href="<?php echo e(URL::action('PostController@view', $post->id)); ?>">Annuler</a>
<h1>Editer l'article</h1>

<?php echo e(Form::model($post, [ 'url' => URL::action('PostController@update', $post ), 'method' => 'post'])); ?>

<p><?php echo e(Form::label('title', 'Titre :')); ?> <?php echo e(Form::text('title')); ?></p>
<p><?php echo e(Form::label('content', 'Article :')); ?> <?php echo e(Form::textarea('content')); ?></p>
<?php echo e(Form::submit()); ?>

<?php echo e(Form::close()); ?>

</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>