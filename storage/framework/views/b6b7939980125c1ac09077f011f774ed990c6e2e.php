<?php $__env->startSection('content'); ?>
<div class="row">
    <h1>Listado de usuarios</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
            <div class="card-tools">
                <a href="<?php echo e(url('/admin/usuarios/create')); ?>" class="btn btn-primary"><i class="bi bi-person-fill-add"></i> Nuevo usuario</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-sm table-striped table-hover">

                <thead>
                    <tr>
                        <th><center>Nro</center></th>
                        <th><center>Nombres</center></th>
                        <th><center>Email</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 0; ?>

                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $contador ++;
                        $id = $usuario->id;
                    ?>
                    <tr>
                        <td><center><?php echo e($contador); ?></center></td>
                        <td><center><?php echo e($usuario->name); ?></center></td>
                        <td><center><?php echo e($usuario->email); ?></center></td>
                        <td style="text-align: center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?php echo e(route('usuarios.show',$usuario->id)); ?>" type="button" class="btn btn-info"><i class="bi bi-eye"></i> Mostrar</a>
                            <a href="<?php echo e(route('usuarios.edit',$usuario->id)); ?>" type="button" class="btn btn-success"><i class="bi bi-pencil"></i> Editar</a>
                            <form action="<?php echo e(route('usuarios.destroy',$usuario->id)); ?>" onclick="preguntar<?=$id;?>(event)"
                                method="post" id="miFormulario<?=$id;?>">
                                <?php echo csrf_field(); ?>
                                <?php echo e(method_field('DELETE')); ?>

                                <!-- laravel 10 <?php echo method_field('PUT'); ?> -->
                                <button type="submit" class="btn btn-danger" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i> Borrar</button>
                            </form>

                            <script>
                                function preguntar<?=$id;?>(event) {
                                    event.preventDefault();
                                    swal.fire({
                                        title: 'Eleminar registro',
                                        text: '¿Desea eliminar este registro?',
                                        icon: 'question',
                                        showDenyButton: true,
                                        confirmButtonText: 'Eliminar',
                                        confirmButtonColor: '#a5161d',
                                        denyButtonColor: '#270a0a',
                                        denyButtonText: 'Cancelar',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            var form = $('#miFormulario<?=$id;?>');
                                            form.submit();
                                        }
                                    });
                                }
                            </script>


                        </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
        </div>

    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/usuarios/index.blade.php ENDPATH**/ ?>