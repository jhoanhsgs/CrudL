<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0">Listado de cuentas</h1>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de cuentas</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Perfiles</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                    <?php $__currentLoopData = $cuentas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuenta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($cuenta->correo); ?></td>
                                        <td><?php echo e($cuenta->contraseña); ?></td>
                                        <td>

                                            <div class="d-flex justify-content-between">
                                                <?php for($i = 1; $i <= 4; $i++): ?>
                                                <i class="bi bi-person text-secondary" data-toggle="modal" data-target="#modalPerfil<?php echo e($cuenta->id); ?>_<?php echo e($i); ?>"></i>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalPerfil<?php echo e($cuenta->id); ?>_<?php echo e($i); ?>" tabindex="-1" role="dialog" aria-labelledby="modalPerfilLabel<?php echo e($cuenta->id); ?>_<?php echo e($i); ?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalPerfilLabel<?php echo e($cuenta->id); ?>_<?php echo e($i); ?>">Asignar Perfil a <?php echo e($cuenta->correo); ?>_<?php echo e($i); ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo e(url('admin/cuentas/asignar')); ?>" method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="text" value="<?php echo e($cuenta->id); ?>" name="id_cuenta" hidden>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Perfil</label>
                                                                                <input type="text" class="form-control" name="perfil" value="Perfil <?php echo e($i); ?>" hidden>
                                                                                <input type="text" class="form-control" name="perfil" value="Perfil <?php echo e($i); ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Codigo</label>
                                                                                <input type="text" class="form-control" name="codigo" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12"></div>
                                                                    </div>



                                                                    <button type="submit" class="btn btn-primary">Asignar Perfil</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endfor; ?>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/cuentas/index.blade.php ENDPATH**/ ?>