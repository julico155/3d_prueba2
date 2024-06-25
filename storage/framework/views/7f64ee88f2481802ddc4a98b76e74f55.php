<?php $__env->startSection('venta'); ?>
<div class="flex justify-center items-center mt-8">
    <div class="bg-white rounded-lg p-8 shadow-lg">
        <h2 class="text-3xl font-semibold mb-4">¡Pedido Exitoso!</h2>
        <p class="text-lg">Gracias por tu pedido. Ten en cuenta que tu pedido estara al pendiente del pago.</p>
        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-2">Resumen de la Compra:</h3>
            <ul class="list-disc list-inside">
                <?php $__currentLoopData = $detalle_carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-base">
                        <?php echo e($detalle->cantidad); ?> x <?php echo e($detalle->producto->nombre); ?>:
                        BOB <?php echo e(number_format($detalle->producto->precio * $detalle->cantidad, 2)); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
            <p class="text-xl mt-4">Total General: BOB <?php echo e(number_format($carrito->total, 2)); ?></p>
        </div>
        <form action="<?php echo e(route('venta.store')); ?>" method="post" class="mt-8">
            <?php echo csrf_field(); ?>
            <input type="text" name="carrito" hidden value="<?php echo e($carrito->id); ?>">
            <button type="submit" class="bg-green-500 hover-bg-green-600 text-white font-bold py-3 px-6 rounded">Continuar</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/continuarefectivo.blade.php ENDPATH**/ ?>