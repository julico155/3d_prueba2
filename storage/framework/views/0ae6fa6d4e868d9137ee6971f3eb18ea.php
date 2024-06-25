<?php $__env->startSection('venta'); ?>
<div class="container mx-auto px-4 mt-8">
    <h1 class="text-3xl font-bold mb-4">Compras Realizadas</h1>

    <!-- Tabla para Ventas Físicas -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Ventas Físicas</h2>
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
                    <?php $__currentLoopData = $ventas_fisicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta_fisica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border-t px-6 py-4"><?php echo e($venta_fisica['venta']->id); ?></td>
                        <td class="border-t px-6 py-4">
                            <ul class="list-disc ml-6">
                                <?php $__currentLoopData = $venta_fisica['productos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($producto->producto_nombre); ?> (<?php echo e($producto->producto_descripcion); ?>)</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td class="border-t px-6 py-4">
                            <a href="<?php echo e(route('notaVenta', ['id' => $venta_fisica['venta']->id])); ?>" class="text-blue-500 hover:underline mr-2">Ver Nota</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Ventas 3D -->
    <div>
        <h2 class="text-2xl font-semibold mb-4">Ventas 3D</h2>
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
                    <?php $__currentLoopData = $ventas_3d; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta_3d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border-t px-6 py-4"><?php echo e($venta_3d['venta']->id); ?></td>
                        <td class="border-t px-6 py-4">
                            <ul class="list-disc ml-6">
                                <?php $__currentLoopData = $venta_3d['productos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($producto->producto_nombre); ?> (<?php echo e($producto->producto_descripcion); ?>)</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td class="border-t px-6 py-4">
                            <a href="<?php echo e(route('notaVenta', ['id' => $venta_3d['venta']->id])); ?>" class="text-blue-500 hover:underline mr-2">Ver Nota</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/VistaCarrito/venta.blade.php ENDPATH**/ ?>