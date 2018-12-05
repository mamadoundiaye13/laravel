<body>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="post-container">
        <h3>
            <a href="<?php echo e(URL::action('PostController@view', $post->id)); ?>"><?php echo e($post->title); ?></a>
        </h3>
        <p><?php echo e($p->content); ?></p>
        <i><?php echo e($post->user->name); ?></i>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</body>
