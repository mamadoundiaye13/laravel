<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        Ajouter un <strong>produit</strong>!



                        <!-- Formulaire pour le produit d'admin-->



                            <div class="card-body">
                                <form method="POST" action="<?php echo url('admin/AddProduits'); ?>" accept-charset="UTF-8">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">

                                        <div class="col-md-6">
                                            <input id="title" placeholder="Product Title" type="text"  name="title" value="<?php echo e(old('title')); ?>" required autofocus>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="desc"  placeholder="Description" type="text"  name="desc" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="stock"  placeholder="Stock Restant" type="number"  name="stock" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="prix"  placeholder="Prix" type="number"  name="prix" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="picture"  placeholder="Picture URL" type="url"  name="picture" required>
                                        </div>
                                    </div>



                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo e(__('Add')); ?>

                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>

            </div>
        </div>





        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        Supprimer Un <strong>Produit</strong> !


                            <!-- Formulaire pour le produit d'admin-->

                        <div class="card-body">
                            <form method="POST"  action="<?php echo e(action('ProduitController@delete')); ?>" accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>



                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="id"  placeholder="ID du produit" type="number"  name="id_produit_delete" required>
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('DELETE')); ?>

                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        Mettre à jour le  <strong>stock_restant</strong> !


                        <!-- Formulaire pour le produit d'admin-->

                        <div class="card-body">
                            <form method="POST" action="<?php echo url('admin/UPDATEStock'); ?>" accept-charset="UTF-8">
                                <?php echo csrf_field(); ?>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="stock_restant"  placeholder="nouveau Stock Restant" type="number"  name="stock_restant" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="id"  placeholder="ID du produit" type="number"  name="id" required>
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('UPDATE')); ?>

                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>