<?php $__env->startSection('venta'); ?>
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-6 lg:p-12">
        <h2 class="text-3xl text-black font-bold mb-6">Carrito de Compras</h2>

        <div class="w-full sm:w-3/4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Precio Unitario</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Precio Total</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $detalle_carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="bg-white">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                    <img class="h-16 w-16 rounded-lg object-cover"
                                        src="<?php echo e(asset($producto->imagen1)); ?>"
                                        alt="<?php echo e($producto->nombre); ?>">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900"><?php echo e($producto->nombre); ?></div>
                                    <div class="text-xs text-gray-500"><?php echo e($producto->descripcion); ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center"><?php echo e($producto->cantidad); ?></td>
                        <td class="px-6 py-4 text-center">BOB <?php echo e($producto->precio); ?></td>
                        <td class="px-6 py-4 text-center">BOB <?php echo e($producto->cantidad * $producto->precio); ?></td>
                        <td class="px-6 py-4 text-center">
                            <form action="<?php echo e(route('carrito.destroy', $producto->id)); ?>" method="post">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit"
                                    class="text-red-600 hover:text-red-800 cursor-pointer">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center mt-8">
                <form action="<?php echo e(route('session')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="carrito" hidden value="<?php echo e($carrito->id); ?>">
                    <?php $__currentLoopData = $detalle_carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="text" name="producto<?php echo e($producto->id); ?>" hidden value="<?php echo e($producto->producto_id); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full transition duration-300" id="pagarTarjeta">Pagar con tarjeta</button>
                    
                </form>
                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full transition duration-300" id="pagarEfectivo">Pagar con efectivo</button>
                <script>
                    // Detectar clic en el botón "Pagar con tarjeta"
                    document.getElementById('pagarTarjeta').addEventListener('click', function () {
                        // No es necesario realizar ninguna acción aquí, el formulario se enviará a la ruta de Stripe
                    });
                
                    // Detectar clic en el botón "Pagar con efectivo"
                    document.getElementById('pagarEfectivo').addEventListener('click', function () {
                        // Redirigir al usuario a la página de efectivo
                        window.location.href = "<?php echo e(route('continuarefectivo')); ?>"; // Reemplaza 'pagina.efectivo' con la ruta correcta
                    });
                </script>
            <div class="text-2xl font-semibold">Total: BOB <?php echo e($carrito->total); ?></div>
        </div>
    </div>
    <div class="border-t my-4">
        <h2 class="text-2xl font-semibold text-black mt-8 mb-4 ml-4 uppercase">Encuentra mas Productos: </h2>
    </div>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.welcome','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('welcome'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Proyectos\SI2\TiendaRopa\resources\views/VistaCarrito/index.blade.php ENDPATH**/ ?>