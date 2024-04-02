<?php $__env->startSection('content'); ?>
<h1>Actualizar producto</h1>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Llene los datos con cuidado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">
                <form action="<?php echo e(url('admin/almacen',$producto->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                <?php echo e(method_field(' PUT')); ?>

                <!-- laravel 10 <?php echo method_field('PUT'); ?> -->
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
                                            <select name="id_categoria" id="" class="form-control" required>
                                                <?php
                                                $nombre_categoria = $producto->categoria->nombre;
                                                foreach ($categorias as $categoria){
                                                        $nombre_categoria_tabla =  $categoria->nombre;
                                                        $id_categoria =  $categoria->id;
                                                    ?>

                                                    <option value="<?php echo e($categoria->id); ?>"
                                                        <?php
                                                            if($nombre_categoria_tabla == $nombre_categoria){
                                                                ?> selected="selected" <?php
                                                            }
                                                        ?>
                                                        >
                                                        <?php echo e($categoria->nombre); ?>

                                                    </option>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del producto:</label>
                                        <input type="text" name="nombre" value="<?php echo e($producto->nombre); ?>" class="form-control" >
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
                                        <textarea name="descripcion" id="" cols="30" rows="2" class="form-control" ><?php echo e($producto->descripcion); ?></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock:</label>
                                        <input type="number" name="stock" value="<?php echo e($producto->stock); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock mínimo:</label>
                                        <input type="number" name="stock_minimo" value="<?php echo e($producto->stock_minimo); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock máximo:</label>
                                        <input type="number" name="stock_maximo" value="<?php echo e($producto->stock_maximo); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio compra:</label>
                                        <input type="number" name="precio_compra" value="<?php echo e($producto->precio_compra); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio venta:</label>
                                        <input type="number" name="precio_venta" value="<?php echo e($producto->precio_venta); ?>" class="form-control" >
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
                                <input type="file" name="image" class="form-control" id="file">
                                <input type="text" name="image_text" value="<?php echo e($producto->imagen); ?>" hidden>
                                <br>
                                <output id="list" style="">
                                    <img src="<?php echo e(asset('storage/'.'productos/'.$producto->imagen)); ?>" width="100%" alt="">
                                </output>
                                <script>
                                    function archivo(evt) {
                                        var files = evt.target.files; // FileList object
                                        // Obtenemos la imagen del campo "file".
                                        for (var i = 0, f; f = files[i]; i++) {
                                            //Solo admitimos imágenes.
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function (theFile) {
                                                return function (e) {
                                                    // Insertamos la imagen
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo e(route('almacen.index')); ?>" class="btn btn-default">Volver</a>
                            <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i> Actualizar registro</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/almacen/edit.blade.php ENDPATH**/ ?>