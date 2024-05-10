<?php $__env->startSection('badges'); ?>
    <a href="<?php echo e(route('cart.ver')); ?>" type="button" class="nav-link position-relative">
        <i class="bi bi-cart-fill"></i>
        <?php if(Cart::content()->count()): ?>


            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo e(Cart::content()->count()); ?>

            </span>

        <?php endif; ?>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="card text-center">
                        <img src="<?php echo e(asset('storage/productos/'.$producto->imagen)); ?>" class="card-img-top">
                        <div class="card-body">
                            <h2><?php echo e($producto->nombre); ?></h2>
                            <p>$COP <?php echo e($producto->precio_venta); ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="<?php echo e(route('cart.add')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="id" value="<?php echo e($producto->id); ?>" hidden>
                                <input type="submit" name="btn" class="btn btn-success w-100" value="addToCart">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(Count(Cart::content())): ?>
                <div class="col-sm-5">
                    <p class="text-center">resumen carrito</p>
                    <table class="table">
                        <tbody>
                            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->qty); ?> x <?php echo e($item->price); ?></td>
                                    <td><?php echo e(number_format($item->qty * $item->price,2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>Subtotal COP$<?php echo e(Cart::subtotal()); ?></td>
                            </tr>
                            <tr>
                                <td>Total COP$<?php echo e(Cart::total()); ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('cart.ver')); ?>">Ver carrito</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudlaravel\resources\views/shop/index.blade.php ENDPATH**/ ?>