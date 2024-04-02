<?php $__env->startSection('content'); ?>
<h1>Datos del producto: <?php echo e($producto->nombre); ?></h1>
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Llene los datos con cuidado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">

                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Código:</label>
                                    <input type="text" class="form-control"
                                           value="<?php echo e($producto->codigo); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoría:</label>
                                    <div style="display: flex">
                                        <input type="text" class="form-control" value="<?php echo e($producto->categoria->nombre); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre del producto:</label>
                                    <input type="text" name="nombre" value="<?php echo e($producto->nombre); ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" class="form-control" value="<?php echo e($producto->user->email); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Descripción del producto:</label>
                                    <textarea name="descripcion" id="" cols="30" rows="2" class="form-control" disabled><?php echo e($producto->descripcion); ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock:</label>
                                    <input type="number" name="stock" value="<?php echo e($producto->stock); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock mínimo:</label>
                                    <input type="number" name="stock_minimo" value="<?php echo e($producto->stock_minimo); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock máximo:</label>
                                    <input type="number" name="stock_maximo" value="<?php echo e($producto->stock_maximo); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio compra:</label>
                                    <input type="number" name="precio_compra" value="<?php echo e($producto->precio_compra); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio venta:</label>
                                    <input type="number" name="precio_venta" value="<?php echo e($producto->precio_venta); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Fecha de ingreso:</label>
                                    <input type="date" name="fecha_ingreso" value="<?php echo e($producto->fecha_ingreso); ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Imagen del producto</label>
                            <center>
                                <img src="<?php echo e(asset('storage/'.'productos/'.$producto->imagen)); ?>" width="90%" alt="">
                            </center>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('almacen.index')); ?>" class="btn btn-default">Volver</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/almacen/show.blade.php ENDPATH**/ ?>