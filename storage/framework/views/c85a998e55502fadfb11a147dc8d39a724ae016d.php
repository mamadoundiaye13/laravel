<?php $__env->startSection('contenu'); ?>
    <form method="POST" action="<?php echo url('users'); ?>" accept-charset="UTF-8">
        <?php echo csrf_field(); ?>

        <label for="nom">Entrez votre nom : </label>
        <input name="nom" type="text" id="nom">
        <input type="submit" value="Envoyer !">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>