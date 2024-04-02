<?php $__env->startSection('content'); ?>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Listado de productos</h1>
    </div>


</div>
    <hr>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Productos registrados</h3>
                        <div class="card-tools">
                            <a href="<?php echo e(url('/admin/almacen/create')); ?>" class="btn btn-primary"><i class="bi bi-person-fill-add"></i> Nuevo producto</a>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th><center>Nro</center></th>
                                            <th><center>Codigo</center></th>
                                            <th><center>Imagen</center></th>
                                            <th><center>Nombre</center></th>
                                            <th><center>Stock</center></th>
                                            <th><center>P-Compra</center></th>
                                            <th><center>P-Venta</center></th>
                                            <th><center>Fecha compra</center></th>
                                            <th><center>Usuario</center></th>
                                            <th><center>Acciones</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $contador_producto=1;
                                            ?>
                                        <?php $__currentLoopData = $almacens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $almacen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><center><?php echo e($contador_producto++); ?></center></td>
                                            <td><?php echo e($almacen->codigo); ?></td>
                                            <td>
                                                <?php echo e($almacen->imagen); ?>

                                                <img src="<?php echo e(url('storage/productos/'.$almacen->imagen)); ?>" width="90%" alt="">
                                            </td>
                                            <td><?php echo e($almacen->nombre); ?></td>
                                            <td><?php echo e($almacen->stock); ?></td>
                                            <td><?php echo e($almacen->precio_compra); ?></td>
                                            <td><?php echo e($almacen->precio_venta); ?></td>
                                            <td><?php echo e($almacen->fecha_ingreso); ?></td>
                                            <td><?php echo e($almacen->user->email); ?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="<?php echo e(route('almacen.show',$almacen->id)); ?>" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                        <a href="<?php echo e(route('almacen.edit',$almacen->id)); ?>" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
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
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/almacen/index.blade.php ENDPATH**/ ?>