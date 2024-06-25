<?php $__env->startSection('producto'); ?>
    <?php if($categorias->isEmpty() || $marcas->isEmpty()): ?>
        <div class="w-full lg:w-1/2 mx-auto mb-8">
            <div class="bg-red-100 border border-red-600 rounded-md p-4">
                <p class="text-red-600 text-lg font-semibold mb-4">
                    <?php if($categorias->isEmpty()): ?>
                        <a href="<?php echo e(route('categoria.index')); ?>" class="text-black hover:underline">
                            Primero debe registrar una categoría
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('marca.index')); ?>" class="text-black hover:underline">
                            Primero debe registrar una marca
                        </a>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    <?php else: ?>
        <div class="w-full lg:w-2/3 mx-auto my-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Registro de Producto</h2>
                <form action="<?php echo e(route('producto.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="categoria" class="text-gray-600 font-semibold text-sm">Categoría:</label>
                            <select name="categoria" id="categoria" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige una categoría</option>
                                <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($c->id); ?>"><?php echo e($c->categoria); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option disabled>Registra una nueva categoría</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label for="marca" class="text-gray-600 font-semibold text-sm">Marca:</label>
                            <select name="marca" id="marca" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige una marca</option>
                                <?php $__empty_1 = true; $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($m->id); ?>"><?php echo e($m->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option disabled>Registra una nueva marca</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mt-6">
                            <label for="foto" class="text-gray-600 font-semibold text-sm">Foto:</label>
                            <input type="file" name="foto" id="foto" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="nombre" class="text-gray-600 font-semibold text-sm">Nombre del producto:</label>
                            <input type="text" name="nombre" id="nombre" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="descripcion" class="text-gray-600 font-semibold text-sm">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mt-6">
                            <label for="cant_min" class="text-gray-600 font-semibold text-sm">Stock Mínimo:</label>
                            <input type="number" name="cant_min" id="cant_min" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="precio" class="text-gray-600 font-semibold text-sm">Precio:</label>
                            <input type="number" name="precio" id="precio" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="talla" class="text-gray-600 font-semibold text-sm">Talla:</label>
                            <select name="talla" id="talla"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige una talla</option>
                                <?php $__empty_1 = true; $__currentLoopData = $tallas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($t->id); ?>">   
                                        <?php echo e($t->tipo_talla_numero); ?>

                                        <?php echo e($t->tipo_talla_letra); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option disabled>Registra una nueva talla</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="mt-6">
                            <label for="color" class="text-gray-600 font-semibold text-sm">Color:</label>
                            <select name="color" id="color"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige un color</option>
                                <!-- Aquí se llenarán las opciones de colores dinámicamente -->
                                <?php $__empty_1 = true; $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($c->id); ?>"><?php echo e($c->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option disabled>Registra un nuevo color</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full focus:outline-none focus:shadow-outline">Guardar</button>
                        <a href="<?php echo e(route('producto.index')); ?>"
                            class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-6 ml-4 rounded-full">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Proyectos\SI2\TiendaRopa\resources\views/VistaProductos/create.blade.php ENDPATH**/ ?>