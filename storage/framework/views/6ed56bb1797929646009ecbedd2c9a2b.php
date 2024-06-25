<?php $__env->startSection('cliente'); ?>
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded p-4 lg:p-8">
            <div class="text-center">
                <a href="<?php echo e(route('welcome')); ?>">
                    <h2 class="text-4xl text-black font-bold mb-6">Stylo Store</h2>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <img src="<?php echo e(asset($p->imagen)); ?>" alt="Foto del producto" class="w-full h-auto lg:h-64 object-contain rounded-lg shadow-lg">
                </div>
                <div class="space-y-4">
                    <h3 class="text-2xl font-medium text-gray-800"><?php echo e($p->nombre); ?></h3>
                    <h3 class="text-2x2 font-medium text-gray-800">BOB. <?php echo e($p->precio); ?></h3>
                    <p class="text-sm text-gray-600">Cantidad disponible: <?php echo e($p->stock); ?></p>
                    <p class="text-gray-600"><?php echo e($p->descripcion); ?></p>

                    <?php if(auth()->guard()->check()): ?>
                        <form action="<?php echo e(route('carrito.update', $p->id)); ?>" method="post">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="producto_id" value="<?php echo e($p->id); ?>">
                            <input type="hidden" name="producto_precio" value="<?php echo e($p->precio); ?>">

                            <div class="flex items-center">
                                <input type="number" name="cantidad" placeholder="Cantidad" required min="1" max="<?php echo e($p->stock); ?>" class="border border-gray-300 px-4 py-2 rounded-l-md w-32">
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-r-md hover:bg-green-600 transition duration-300">Agregar al Carrito</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p class="text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2">Inicia sesión para poder comprar</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Proyectos\SI2\TiendaRopa\resources\views/VistaEmpresa/productoShow.blade.php ENDPATH**/ ?>