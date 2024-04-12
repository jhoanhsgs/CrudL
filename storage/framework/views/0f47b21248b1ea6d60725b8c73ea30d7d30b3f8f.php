<?php $__env->startSection('content'); ?>
<h1>Compra: <?php echo e($compra->nro_compra); ?>

    <a href="<?php echo e(route('compras.index')); ?>" class="btn btn-default">Volver</a>
</h1>
<div class="row">
    <div class="col-md-9">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Datos de la compra</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">

                <div class="row" style="font-size: 12px">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Código:</label>
                                    <input type="text" class="form-control"
                                           value="<?php echo e($compra->producto->codigo); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoría:</label>
                                    <div style="display: flex">
                                        <input type="text" class="form-control" value="<?php echo e($compra->producto->categoria->nombre); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre del producto:</label>
                                    <input type="text" name="nombre" value="<?php echo e($compra->producto->nombre); ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Descripción del producto:</label>
                                    <textarea name="descripcion" id="" cols="30" rows="2" class="form-control" disabled><?php echo e($compra->producto->descripcion); ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock:</label>
                                    <input type="number" name="stock" value="<?php echo e($compra->producto->stock); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock mínimo:</label>
                                    <input type="number" name="stock_minimo" value="<?php echo e($compra->producto->stock_minimo); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock máximo:</label>
                                    <input type="number" name="stock_maximo" value="<?php echo e($compra->producto->stock_maximo); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio compra:</label>
                                    <input type="number" name="precio_compra" value="<?php echo e($compra->producto->precio_compra); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio venta:</label>
                                    <input type="number" name="precio_venta" value="<?php echo e($compra->producto->precio_venta); ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Fecha de ingreso:</label>
                                    <input type="date" name="fecha_ingreso" value="<?php echo e($compra->producto->decha_ingreso); ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Imagen del producto</label>
                            <center>
                                <img src="<?php echo e(asset('storage/'.'productos/'.$compra->producto->imagen)); ?>" width="100%" alt="">
                            </center>
                        </div>
                    </div>
                </div>
                <div style="display: flex">
                    <h5>Datos del proveedor </h5>
                </div>
                <hr>

                <div class="container-fluid" style="font-size: 12px">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="id_proveedor" hidden>
                                <label for="">Nombre del proveedor </label>
                                <input type="text" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="number" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="number" value="" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Empresa </label>
                                <input type="text" value="" class="form-control" disabled>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled>  </textarea>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
    <div class="col-md-3">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detalle de la compra</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Número de la compra</label>
                                    <input type="text" value="" style="text-align: center" class="form-control" disabled>
                                    <input type="text" value="<" id="nro_compra" hidden>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de la compra</label>
                                    <input type="date" value="" class="form-control" id="fecha_compra" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comprobante de la compra</label>
                                    <input type="text" value="" class="form-control" id="comprobante" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Precio de la compra</label>
                                    <input type="text" value="" class="form-control" id="precio_compra_controlador" disabled>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Cantidad de la compra</label>
                                    <input type="number" value="" id="cantidad_compra" style="text-align: center" class="form-control" disabled>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" class="form-control" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>

                </div>

            </div>


        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/compras/show.blade.php ENDPATH**/ ?>