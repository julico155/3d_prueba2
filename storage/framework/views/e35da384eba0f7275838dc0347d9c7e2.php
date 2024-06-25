

<?php $__env->startSection('compra'); ?>
    <div class="flex flex-col items-center sm:flex-row">
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('pedido.index')); ?>" class="bg-indigo-500 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Solicitar Pedidos
            </a>
        </div>
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('compra.index')); ?>" class="bg-teal-500 hover:bg-teal-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Notas de compras a proveedores
            </a>
        </div>
        <div class="mt-4 sm:ml-4">
            <a href="<?php echo e(route('proveedor.index')); ?>" class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Proveedores
            </a>
        </div>
    </div>

    <div class="container mx-auto px-4 mt-8">
        <table class="min-w-full border border-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="bg-gray-200 text-left px-6 py-3">No. de Compra</th>
                    <th class="bg-gray-200 text-left px-6 py-3">Ver Nota de Compra</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border-t px-6 py-4"><?php echo e($compra->id); ?></td>
                    <td class="border-t px-6 py-4">
                        <a href="<?php echo e(route('notaCompra', ['id' => $compra->id])); ?>" class="text-blue-500 hover:underline">Ver Nota</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/VistaCompra/index.blade.php ENDPATH**/ ?>