

<?php $__env->startSection('venta'); ?>
<div class="flex justify-center items-center mt-8">
    <div class="bg-white rounded-lg p-8 shadow-lg">
        <h2 class="text-3xl font-semibold mb-4">¡Pago Exitoso!</h2>
        <p class="text-lg">Gracias por tu compra. Tu pedido se ha procesado exitosamente.</p>
        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-2">Resumen de la Compra:</h3>
            <ul class="list-disc list-inside">
                    <li class="text-base">
                        1 x <?php echo e($producto->nombre); ?>:
                        BOB <?php echo e(number_format($producto->precio_3d , 2)); ?>

                    </li>
            </ul>
            <p class="text-xl mt-4">Total General: BOB <?php echo e(number_format($producto->precio_3d, 2)); ?></p>
        </div>
        <form action="<?php echo e(route('venta.store2')); ?>" method="post" class="mt-8">
            <?php echo csrf_field(); ?>
            <input type="text" name="producto" hidden value="<?php echo e($producto->id); ?>">
            <button type="submit" class="bg-green-500 hover-bg-green-600 text-white font-bold py-3 px-6 rounded">Continuar</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/continuar2.blade.php ENDPATH**/ ?>