<?php $__env->startSection('content'); ?>
<h4>Registro de una nueva compra
</h4>
<div class="row">
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos con cuidado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">

                <div style="display: flex">
                    <h5>Datos del producto </h5>
                    <div style="width: 20px"></div>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-buscar_producto">
                        <i class="fa fa-search"></i>
                        Buscar producto
                    </button>
                    <!-- modal para visualizar datos de los proveedor -->
                    <div class="modal fade" id="modal-buscar_producto">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #1d36b6;color: white">
                                    <h4 class="modal-title">Busqueda del producto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table table-responsive">
                                        <table id="example1" class="table table-bordered table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th><center>Nro</center></th>
                                                <th><center>Selecionar</center></th>
                                                <th><center>Código</center></th>
                                                <th><center>Categoría</center></th>
                                                <th><center>Imagen</center></th>
                                                <th><center>Nombre</center></th>
                                                <th><center>Descripción</center></th>
                                                <th><center>Stock</center></th>
                                                <th><center>Precio compra</center></th>
                                                <th><center>Precio venta</center></th>
                                                <th><center>Fecha compra</center></th>
                                                <th><center>Usuario</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td>
                                                            <button class="btn btn-info btn-seleccionar"
                                                            data-id="<?php echo e($producto->id); ?>"
                                                            data-codigo="<?php echo e($producto->codigo); ?>"
                                                            data-categoria="<?php echo e($producto->categoria->nombre); ?>"
                                                            data-nombre="<?php echo e($producto->nombre); ?>"
                                                            data-usuario="<?php echo e($producto->user->name); ?>"
                                                            data-descripcion="<?php echo e($producto->descripcion); ?>"
                                                            data-stock="<?php echo e($producto->stock); ?>"
                                                            data-stock_minimo="<?php echo e($producto->stock_minimo); ?>"
                                                            data-stock_maximo="<?php echo e($producto->stock_maximo); ?>"
                                                            data-precio_compra="<?php echo e($producto->precio_compra); ?>"
                                                            data-precio_venta="<?php echo e($producto->precio_venta); ?>"
                                                            data-fecha_ingreso="<?php echo e($producto->fecha_ingreso); ?>"
                                                            data-imagen="<?php echo e(asset('storage/productos/'.$producto->imagen)); ?>"
                                                            >Selecionar
                                                            </button>



                                                        </td>
                                                        <td><?php echo e($producto->codigo); ?></td>
                                                        <td><?php echo e($producto->categoria->nombre); ?></td>
                                                        <td>
                                                            <img src="<?php echo e(asset('storage/productos/'.$producto->imagen)); ?>" width="50px" alt="">
                                                        </td>
                                                        <td><?php echo e($producto->nombre); ?></td>
                                                        <td><?php echo e($producto->descripcion); ?></td>
                                                        <td><?php echo e($producto->stock); ?></td>
                                                        <td><?php echo e($producto->precio_compra); ?></td>
                                                        <td><?php echo e($producto->precio_venta); ?></td>
                                                        <td><?php echo e($producto->fecha_ingreso); ?></td>
                                                        <td><?php echo e($producto->user->email); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var botonesSeleccionar = document.querySelectorAll('.btn-seleccionar');
                                                        botonesSeleccionar.forEach(function(boton) {
                                                            boton.addEventListener('click', function() {
                                                                var id_producto = this.getAttribute('data-id');
                                                                console.log('Producto seleccionado - ID: ' + id_producto);
                                                                document.getElementById('id_producto').value = id_producto;

                                                                var codigo = this.getAttribute('data-codigo');
                                                                document.getElementById('codigo').value = codigo;

                                                                var categoria = this.getAttribute('data-categoria');
                                                                document.getElementById('categoria').value = categoria;

                                                                var nombre = this.getAttribute('data-nombre');
                                                                document.getElementById('nombre').value = nombre;

                                                                var usuario = this.getAttribute('data-usuario');
                                                                document.getElementById('usuario').value = usuario;

                                                                var descripcion = this.getAttribute('data-descripcion');
                                                                document.getElementById('descripcion').value = descripcion;

                                                                var stock = this.getAttribute('data-stock');
                                                                document.getElementById('stock').value = stock;
                                                                document.getElementById('stock_actual').value = stock;

                                                                var stock_minimo = this.getAttribute('data-stock_minimo');
                                                                document.getElementById('stock_minimo').value = stock_minimo;

                                                                var stock_maximo= this.getAttribute('data-stock_maximo');
                                                                document.getElementById('stock_maximo').value = stock_maximo

                                                                var precio_compra= this.getAttribute('data-precio_compra');
                                                                document.getElementById('precio_compra').value = precio_compra

                                                                var precio_venta= this.getAttribute('data-precio_venta');
                                                                document.getElementById('precio_venta').value = precio_venta

                                                                var fecha_ingreso= this.getAttribute('data-fecha_ingreso');
                                                                document.getElementById('fecha_ingreso').value = fecha_ingreso

                                                                var imagen= this.getAttribute('data-imagen');
                                                                document.getElementById('imagen').src = imagen

                                                                $('#modal-buscar_producto').modal('toggle');
                                                            });
                                                        });
                                                    });
                                                </script>




                                            </tbody>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>

                <hr>
                <div class="row" style="font-size: 12px">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Código:</label>
                                    <input type="text" id="id_producto" hidden>
                                    <input type="text" class="form-control" id="codigo" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoría:</label>
                                    <div style="display: flex">
                                        <input type="text" class="form-control"  id="categoria" value="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre del producto:</label>
                                    <input type="text" name="nombre" id="nombre" value="" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Descripción del producto:</label>
                                    <textarea name="" id="descripcion" cols="30" rows="2" class="form-control" disabled> </textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock:</label>
                                    <input type="number" name="" id="stock" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock mínimo:</label>
                                    <input type="number" name="" id="stock_minimo" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock máximo:</label>
                                    <input type="number" name="" id="stock_maximo" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio compra:</label>
                                    <input type="number" name="" id="precio_compra" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio venta:</label>
                                    <input type="number" name="" id="precio_venta" value="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Fecha ingreso:</label>
                                    <input type="date" name="" id="fecha_ingreso" value="" class="form-control" disabled>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Imagen del producto</label>
                            <center>
                                <img src="" id="imagen" width="90%" alt="">
                            </center>
                        </div>
                    </div>
                </div>
                <div style="display: flex">
                    <h5>Datos del proveedor </h5>
                    <div style="width: 20px"></div>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-buscar_proveedor">
                        <i class="fa fa-search"></i>
                        Buscar producto
                    </button>
                    <!-- modal para visualizar datos de los proveedor -->
                    <div class="modal fade" id="modal-buscar_proveedor">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #1d36b6;color: white">
                                    <h4 class="modal-title">Busqueda del producto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table table-responsive">
                                        <table id="example1" class="table table-bordered table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th><center>Nro</center></th>
                                                <th><center>Selecionar</center></th>
                                                <th><center>Nombre del proveedor</center></th>
                                                <th><center>Celular</center></th>
                                                <th><center>Telefono</center></th>
                                                <th><center>Empresa</center></th>
                                                <th><center>Email</center></th>
                                                <th><center>Direccion</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td>
                                                            <button class="btn btn-info btn-seleccionp"
                                                            data-id_p="<?php echo e($proveedor->id); ?>"
                                                            data-nombre_p="<?php echo e($proveedor->nombre); ?>"
                                                            data-celular="<?php echo e($proveedor->celular); ?>"
                                                            data-telefono="<?php echo e($proveedor->telefono); ?>"
                                                            data-empresa="<?php echo e($proveedor->empresa); ?>"
                                                            data-email="<?php echo e($proveedor->email); ?>"
                                                            data-direccion="<?php echo e($proveedor->direccion); ?>"
                                                            >Selecionar
                                                            </button>



                                                        </td>
                                                        <td><?php echo e($proveedor->nombre); ?></td>
                                                        <td><?php echo e($proveedor->celular); ?></td>
                                                        <td><?php echo e($proveedor->telefono); ?></td>
                                                        <td><?php echo e($proveedor->empresa); ?></td>
                                                        <td><?php echo e($proveedor->email); ?></td>
                                                        <td><?php echo e($proveedor->direccion); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var botonesSeleccionar = document.querySelectorAll('.btn-seleccionp');
                                                        botonesSeleccionar.forEach(function(boton) {
                                                            boton.addEventListener('click', function() {
                                                                var id_p = this.getAttribute('data-id_p');
                                                                console.log('Proveedor seleccionado - ID: ' + id_p);
                                                                document.getElementById('id_proveedor').value = id_p;

                                                                var nombre = this.getAttribute('data-nombre_p');
                                                                document.getElementById('nombre_proveedor').value = nombre;

                                                                var celular = this.getAttribute('data-celular');
                                                                document.getElementById('celular').value = celular;

                                                                var telefono = this.getAttribute('data-telefono');
                                                                document.getElementById('telefono').value = telefono;

                                                                var celular = this.getAttribute('data-celular');
                                                                document.getElementById('celular').value = celular;

                                                                var empresa = this.getAttribute('data-empresa');
                                                                document.getElementById('empresa').value = empresa;

                                                                var email = this.getAttribute('data-email');
                                                                document.getElementById('email').value = email;

                                                                var direccion = this.getAttribute('data-direccion');
                                                                document.getElementById('direccion').value = direccion;

                                                                $('#modal-buscar_proveedor').modal('toggle');
                                                            });
                                                        });
                                                    });
                                                </script>




                                            </tbody>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <hr>

                <div class="container-fluid" style="font-size: 12px">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="id_proveedor" hidden>
                                <label for="">Nombre del proveedor </label>
                                <input type="text" id="nombre_proveedor" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="number" id="celular" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="number" id="telefono" value="" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Empresa </label>
                                <input type="text" id="empresa" value="" class="form-control" disabled>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" id="email" value="" class="form-control" disabled>
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
                                    <?php
                                        $contador_pro= 1;
                                    ?>
                                    <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $contador_pro++ ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <label for="">Número de la compra</label>
                                    <input type="text" value="<?php echo e($contador_pro); ?>" style="text-align: center" class="form-control" disabled>
                                    <input type="text" value="<?php echo e($contador_pro); ?>" id="nro_compra" hidden>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de la compra</label>
                                    <input type="date" value="" class="form-control" id="fecha_compra">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comprobante de la compra</label>
                                    <input type="text" value="" class="form-control" id="comprobante" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Precio de la compra</label>
                                    <input type="text" value="" class="form-control" id="precio_compra_controlador" disabled>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Stock actual</label>
                                    <input type="text" style="background-color: #fff819;text-align: center" id="stock_actual" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Stock Total</label>
                                    <input type="text" style="text-align: center" id="stock_total" class="form-control" disabled>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Cantidad de la compra</label>
                                    <input type="number" value="" id="cantidad_compra" style="text-align: center" class="form-control">
                                </div>
                            </div>
                            <script>
                                // Esperar a que el DOM esté completamente cargado
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Obtener el input de cantidad_compra
                                    var inputCantidadCompra = document.getElementById('cantidad_compra');

                                    // Agregar un evento de escucha para el evento input
                                    inputCantidadCompra.addEventListener('input', function() {
                                        // Mostrar una alerta cuando se presiona una tecla dentro del input
                                        //alert('Estamos presionando el input');
                                        var stock_actual = $('#stock_actual').val();
                                        var stock_compra = $('#cantidad_compra').val();
                                        var precio_compra = $('#precio_compra').val();

                                        var total = parseInt(stock_actual)+ parseInt(stock_compra);
                                        var total_compra = parseInt(precio_compra)* parseInt(stock_compra);
                                        $('#stock_total').val(total);
                                        $('#precio_compra_controlador').val(total_compra);
                                    });
                                });
                            </script>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" id="id_seccion" value="<?php echo e(Auth::user()->id); ?>" hidden>
                                    <input type="text" class="form-control" value="<?php echo e(Auth::user()->email); ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="btn_guardar_compra">Guardar compra</button>
                            </div>
                        </div>

                        <script>
                            $('#btn_guardar_compra').click(function () {
                                var id_producto = $('#id_producto').val().trim();
                                var fecha_compra = $('#fecha_compra').val().trim();
                                var nro_compra = $('#nro_compra').val().trim();
                                var id_proveedor = $('#id_proveedor').val().trim();
                                var comprobante = $('#comprobante').val().trim();
                                var id_user = $('#id_user').val().trim();
                                var precio_compra = $('#precio_compra_controlador').val().trim();
                                var cantidad = $('#cantidad_compra').val().trim();

                                // Verificar si algún campo está vacío
                                if (id_producto === "" || fecha_compra === "" || nro_compra === "" || id_proveedor === "" || comprobante === "" || id_user === "" || precio_compra === "" || cantidad === "") {
                                    // Mostrar mensaje de alerta
                                    alert("Debe llenar todos los campos");
                                    return; // Detener la ejecución si hay campos vacíos
                                }

                                // Todos los campos están completos, continuar con el proceso de guardado
                                console.log("Datos de la compra completos. Enviar al backend para guardar.");
                            });
                        </script>



                    </div>

                </div>

            </div>


        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/admin/compras/create.blade.php ENDPATH**/ ?>