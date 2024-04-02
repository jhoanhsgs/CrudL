<?php $__env->startSection('content'); ?>


<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Mi unidad</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                <i class="bi bi-folder-fill"></i> Nueva carpeta
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nombre de la carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(url('/admin/mi_unidad')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="user_id" value="<?php echo e(Auth::user()->id); ?>" hidden>
                                        <input type="text" class="form-control" name="nombre" required>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </ol>

    </div>

</div>
<hr>
<h5>Carpetas</h5>
<div class="row">
    <?php $__currentLoopData = $carpetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carpeta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="col-md-3" >
        <div class="divcontent" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($carpeta->nombre); ?>">
            <div class="row" style="padding: 10px">

                <div class="col-2" style="text-align: center">
                    <i class="bi bi-folder-fill" style="font-size: 20pt; color: <?php echo e($carpeta->color); ?>"></i>
                </div>

                <div class="col-8" style="margin-top: 5px">
                    <a href="<?php echo e(url('/admin/mi_unidad/carpeta',$carpeta->id)); ?>" style="color: black">
                        <?php echo e($carpeta->nombre); ?>

                    </a>


                </div>

                <div class="col-2" style="margin-top: 5px; text-align: right">
                    <div class="btn-group" role="group">
                        <button  class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_cambiar_nombre<?php echo e($carpeta->id); ?>">
                                <i class="bi bi-pencil"></i>Cambiar Nombre
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i>
                                Color de la carpeta <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="<?php echo e(url('/admin/mi_unidad')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="text" value="yellow" name="color" hidden>
                                        <input type="text" value="<?php echo e($carpeta->id); ?>" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: yellow"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo e(url('/admin/mi_unidad')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="text" value="blue" name="color" hidden>
                                        <input type="text" value="<?php echo e($carpeta->id); ?>" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: blue"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo e(url('/admin/mi_unidad')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="text" value="red" name="color" hidden>
                                        <input type="text" value="<?php echo e($carpeta->id); ?>" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: red"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo e(url('/admin/mi_unidad')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="text" value="" name="color" hidden>
                                        <input type="text" value="<?php echo e($carpeta->id); ?>" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: black"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo e(url('/admin/mi_unidad')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="text" value="green" name="color" hidden>
                                        <input type="text" value="<?php echo e($carpeta->id); ?>" name="id" hidden>
                                        <button style="background: white; border: 0px">
                                            <i class="bi bi-circle-fill" style="color: green"></i>
                                        </button>
                                    </form>
                                  </div>

                            </a>
                            <form action="<?php echo e(url('/admin/mi_unidad/eliminar_carpeta',$carpeta->id)); ?>"
                                onclick="preguntar<?php echo e($carpeta->id); ?>(event)" id="miFormularioB<?php echo e($carpeta->id); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input type="text" value="<?php echo e($carpeta->id); ?>" hidden>

                                <button type="submit" class="dropdown-item" href="#"><i class="bi bi-trash"></i>Eliminar</button>
                            </form>
                            <script>
                                function preguntar<?php echo e($carpeta->id); ?>(event) {
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
                                            var form = $('#miFormularioB<?php echo e($carpeta->id); ?>');
                                            form.submit();
                                        }
                                    });
                                }
                            </script>

                        </div>
                      </div>
                </div>

            </div>
        </div>
    </div>
     <!-- Modal para cambiar nombre de la carpeta-->
     <div class="modal fade" id="modal_cambiar_nombre<?php echo e($carpeta->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar nombre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url('/admin/mi_unidad')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="text" value="<?php echo e($carpeta->id); ?>" name="id" hidden>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo e($carpeta->nombre); ?>" name="nombre" required>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
        </div>
        </div>
    </div>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/mi_unidad/index.blade.php ENDPATH**/ ?>