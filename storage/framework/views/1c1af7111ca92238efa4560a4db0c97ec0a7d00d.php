<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0">Listado de compras
                <a href="<?php echo e(url('admin/create/compra')); ?>" class="btn btn-primary" >
                    <i class="fa fa-plus"></i> Creacion de compra
                </a>
            </h1>
        </div>
        </div>



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de compras</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nro de la compra</center></th>
                                    <th><center>Producto compra</center></th>
                                    <th><center>Fecha de la compra</center></th>
                                    <th><center>Proveedor</center></th>
                                    <th><center>Comprobante</center></th>
                                    <th><center>Usuario</center></th>
                                    <th><center>Precio compra</center></th>
                                    <th><center>Cantidad</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $contador=1;?>
                                    <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($contador++); ?></td>
                                        <td><?php echo e($compra->nro_compra); ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#modal_producto<?php echo e($compra->id); ?>">
                                                <?php echo e($compra->producto->nombre); ?>

                                            </button>

                                            <!-- Modal vizualizar datos del producto -->
                                            <div class="modal fade" id="modal_producto<?php echo e($compra->id); ?>" >
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #07b0d6;color: white">
                                                    <h4 class="modal-title">Datos del producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="">Código</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->codigo); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del producto</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->nombre); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Descripción del producto</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->descripcion); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Stock</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->stock); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Stock mínimo</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->stock_minimo); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Stock máximo</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->stock_maximo); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Fecha de Ingreso</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->fecha_ingreso); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Precio Compra</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->precio_compra); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Precio Venta</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->precio_venta); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Categoría</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->categoria->nombre); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Usuario</label>
                                                                            <input type="text" value="<?php echo e($compra->producto->user->name); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">Imagen del producto</label>
                                                                    <img src="<?php echo e(asset('storage/productos/'.$compra->producto->imagen)); ?>" width="100%" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo e($compra->fecha_compra); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modal-proveedor<?php echo e($compra->id); ?>">
                                                        <?php echo e($compra->proveedor->nombre); ?>

                                                </button>

                                                <!-- modal para visualizar datos de los proveedor -->
                                                <div class="modal fade" id="modal-proveedor<?php echo e($compra->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #07b0d6;color: white">
                                                                <h4 class="modal-title">Datos del proveedor</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del proveedor</label>
                                                                            <input type="text" value="<?php echo e($compra->proveedor->nombre); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Celular del proveedor</label>
                                                                            <a href="https://wa.me/57<?php echo e($compra->proveedor->celular); ?>" target="_blank" class="btn btn-success">
                                                                                <i class="fa fa-phone"></i>
                                                                                <?php echo e($compra->proveedor->celular); ?>

                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Teléfono del proveedor</label>
                                                                            <input type="text" value="<?php echo e($compra->proveedor->telefonoe); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Empresa</label>
                                                                            <input type="text" value="<?php echo e($compra->proveedor->empresa); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Email del proveedor</label>
                                                                            <input type="text" value="<?php echo e($compra->proveedor->email); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Dirección</label>
                                                                            <input type="text" value="<?php echo e($compra->proveedor->direccion); ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                        </td>
                                        <td><?php echo e($compra->comprobante); ?></td>
                                        <td><?php echo e($compra->user->name); ?></td>
                                        <td><?php echo e($compra->precio_compra); ?></td>
                                        <td><?php echo e($compra->cantidad); ?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="<?php echo e(route('compras.show',$compra->id)); ?>" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    <a href="<?php echo e(route('compras.edit',$compra->id)); ?>" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                                  </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/compras/index.blade.php ENDPATH**/ ?>