<?php $__env->startSection('producto'); ?>
    <?php if($categorias->isEmpty() || $marcas->isEmpty()): ?>
        <div class="w-full lg:w-1/2 mx-auto mb-4">
            <p class="my-8 text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">
                <?php if($categorias->isEmpty()): ?>
                    <a href="<?php echo e(route('categoria.create')); ?>" class="text-black hover:underline">
                        Primero debe registrar una categoría
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('marca.index')); ?>" class="text-black hover:underline">
                        Primero debe registrar una marca
                    </a>
                <?php endif; ?>
            </p>
        </div>
    <?php else: ?>
        <div class="w-full lg:w-2/3 mx-auto my-4">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Actualizar Producto</h2>
            <form action="<?php echo e(route('producto.update', $p->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="categoria" class="text-gray-600 font-semibold text-sm">Categoría:</label>
                        <select name="categoria" id="categoria" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option disabled>Elige una categoría</option>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($c->id); ?>" <?php echo e($p->categoria_id == $c->id ? 'selected' : ''); ?>><?php echo e($c->categoria); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div>
                        <label for="marca" class="text-gray-600 font-semibold text-sm">Marca:</label>
                        <select name="marca" id="marca" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option disabled>Elige una marca</option>
                            <?php $__empty_1 = true; $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($m->id); ?>" <?php echo e($p->marca_id == $m->id ? 'selected' : ''); ?>><?php echo e($m->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <option disabled>No hay marcas registradas</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <!-- Repite para cada foto, video y archivo 3D con opción para mantener o reemplazar -->
                <div class="grid grid-cols-2 gap-6">
                    <?php for($i = 1; $i <= 3; $i++): ?>
                        <div class="mt-6">
                            <label for="foto<?php echo e($i); ?>" class="text-gray-600 font-semibold text-sm">Foto <?php echo e($i); ?>:</label>
                            <?php if($p->{'imagen' . $i}): ?>
                                <img src="<?php echo e(asset($p->{'imagen' . $i})); ?>" alt="Imagen actual <?php echo e($i); ?>" class="mb-2" width="150">
                            <?php endif; ?>
                            <input type="file" name="foto<?php echo e($i); ?>" id="foto<?php echo e($i); ?>"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                    <?php endfor; ?>

                    <div class="mt-6">
                        <label for="video" class="text-gray-600 font-semibold text-sm">Video:</label>
                        <?php if($p->video): ?>
                            <video width="150" controls class="mb-2">
                                <source src="<?php echo e(asset($p->video)); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php endif; ?>
                        <input type="file" name="video" id="video"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>

                    <div class="mt-6">
                        <label for="archivo_3d" class="text-gray-600 font-semibold text-sm">Archivo 3D:</label>
                        <?php if($p->archivo_3d): ?>
                            <a href="<?php echo e(asset($p->archivo_3d)); ?>" target="_blank">Ver Archivo Actual</a>
                        <?php endif; ?>
                        <input type="file" name="archivo_3d" id="archivo_3d"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                </div>

                <!-- Agrega campos adicionales como en la vista de creación -->
                <div class="mt-6">
                    <label for="nombre" class="text-gray-600 font-semibold text-sm">Nombre del producto:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo e($p->nombre); ?>" required
                        class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mt-6">
                    <label for="descripcion" class="text-gray-600 font-semibold text-sm">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required
                        class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"><?php echo e($p->descripcion); ?></textarea>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="mt-6">
                        <label for="cant_min" class="text-gray-600 font-semibold text-sm">Stock Mínimo:</label>
                        <input type="number" name="cant_min" id="cant_min" value="<?php echo e($p->stock_min); ?>" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mt-6">
                        <label for="precio" class="text-gray-600 font-semibold text-sm">Precio:</label>
                        <input type="number" name="precio" id="precio" value="<?php echo e($p->precio); ?>" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full focus:outline-none focus:shadow-outline">Actualizar</button>
                    <a href="<?php echo e(route('producto.index')); ?>" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-6 ml-4 rounded-full">Cancelar</a>
                </div>
            </form>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/VistaProductos/edit.blade.php ENDPATH**/ ?>