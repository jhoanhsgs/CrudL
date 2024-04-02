<?php $__env->startSection('content'); ?>
<div class="row">
    <h1>Principal</h1>
</div>
<hr>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
        <div class="inner">
            <?php $contador_usuarios =0; ?>
            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $contador_usuarios++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($contador_usuarios); ?></h3>
        <p>Usuarios registrados</p>
        </div>
        <div class="icon">
        <i class="fas fa-user-plus"></i>
        </div>
        <a href="<?php echo e(url('/admin/usuarios')); ?>" class="small-box-footer">
        Más información <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <?php $contador_carpetas =0; ?>
                <?php $__currentLoopData = $carpeta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carpeta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $contador_carpetas++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <h3><?php echo e($contador_carpetas); ?></h3>
                <p>Carpetas registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a   class="small-box-footer">
                ,
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/index.blade.php ENDPATH**/ ?>