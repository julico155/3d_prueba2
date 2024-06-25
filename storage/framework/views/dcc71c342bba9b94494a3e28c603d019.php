<?php $__env->startSection('venta'); ?>
<div class="container mx-auto px-4 mt-8">
    <h1 class="text-3xl font-bold mb-4">Compras Realizadas</h1>

    <div class="w-full overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="bg-gray-100 text-left px-6 py-3">No. de Venta</th>
                    <th class="bg-gray-100 text-left px-6 py-3">Artículos</th>
                    <th class="bg-gray-100 text-left px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border-t px-6 py-4"><?php echo e($venta['venta']->id); ?></td>
                    <td class="border-t px-6 py-4">
                        <ul class="list-disc ml-6">
                            <?php $__currentLoopData = $venta['productos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($producto->producto_nombre); ?> (<?php echo e($producto->producto_descripcion); ?>)</li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                    <td class="border-t px-6 py-4">
                        <a href="<?php echo e(route('notaVenta', ['id' => $venta['venta']->id])); ?>" class="text-blue-500 hover:underline mr-2">Ver Nota</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Proyectos\SI2\TiendaRopa\resources\views/VistaCarrito/venta.blade.php ENDPATH**/ ?>