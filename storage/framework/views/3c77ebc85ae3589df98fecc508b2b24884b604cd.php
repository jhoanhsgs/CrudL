<?php $__env->startSection('content'); ?>
<div class="row">
    <h1>Datos del  suario</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Llene los datos con cuidado</h3>
        </div>
        <div class="card-body">
           
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre del usuario</label>
                            <p><?php echo e($usuario->name); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Correo del usuario</label>
                            <p><?php echo e($usuario->email); ?></p>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo e(url('admin/usuarios')); ?>" class="btn btn-default">Volver</a>
                    </div>
                </div>
        </div>

    </div>    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/usuarios/show.blade.php ENDPATH**/ ?>