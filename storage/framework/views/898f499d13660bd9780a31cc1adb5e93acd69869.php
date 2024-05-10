<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">

      <div class="col-sm-7 btn-danger">
        <p class="text-center">Carrito</p>
        <div class="col-sm-12 btn-info">

            <?php if(Cart::content()->count()): ?>



            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Canditad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <div class="row">
                                <div class="col-md-12">
                                    <td class="m-0">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="<?php echo e(asset('storage/productos/'.$item->options->imagen)); ?>" width="100%" >
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5><?php echo e($item->name); ?></h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Precio: <?php echo e(number_format($item->price )); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/decrementarCart/<?php echo e($item->rowId); ?>" class="btn btn-success">-</a>
                                            <button type="button" class="btn"><?php echo e($item->qty); ?></button>
                                            <a href="/incrementarCart/<?php echo e($item->rowId); ?>" class="btn btn-success">+</a>
                                        </div>
                                    </td>
                                    <td><?php echo e(number_format($item->qty * $item->price)); ?></td>
                                    <td><a href="/eliminaritemCart/<?php echo e($item->rowId); ?>" class="btn btn-sm text-danger">x</a></td>
                                </div>
                            </div>


                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </tbody>
            </table>

            <?php else: ?>
                <p class="text-center">Carrito vacio</p>
            <?php endif; ?>

        </div>
      </div>
      <div class="col-sm-5 btn-info">
        <p class="text-center">Detalles</p>
        <div class="col-sm-12 btn-danger">

            <?php if(Cart::content()->count()): ?>



            <div class="float-right">Total del carrito</div>

            <?php else: ?>
            <p class="text-center">Carrito vacio</p>
        <?php endif; ?>

      </div>
      </div>

    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <p class="text-center">Carrito</p>

    <div class="col-md-7">

    </div>

    <div class="col-md-5">
        <p>Detalles </p>
        <div class="col-sm-4">
            <a href="<?php echo e(route('cart.eliminar')); ?>" class="btn btn-outline-danger">Eliminar carrito</a>
        </div>
        <div class="col-sm-4">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('cart.confirmar')); ?>" class="btn btn-danger">Procesar pedido</a>
            <?php else: ?>
                <a href="/login">ingresar para ordenar</a>
            <?php endif; ?>
        </div>
    </div>
  </div>
</div>

<?php if(Cart::content()->count()): ?>

<?php else: ?>
    <p class="text-center">Carrito vacio</p>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/shop/carrito.blade.php ENDPATH**/ ?>