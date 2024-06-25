<?php

    use App\Models\producto;
    use App\Models\categoria;

    $buscar = Request('buscar');

    $categorias = Categoria::with([
        'productos' => function ($query) use ($buscar) {
            $query->where('nombre', 'like', '%' . $buscar . '%');
        },
    ])
        // ->where('categoria', 'like', '%' . $buscar . '%')
        ->get();
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

<div class="bg-white py-8">
    <div class="container mx-auto">

        <form action="" method="GET">
            <!-- Contenedor del buscador -->
            <div class="flex justify-center mb-8">
                <input type="text" name="buscar" placeholder="Buscar producto"
                    class="border border-gray-300 px-4 py-2 rounded-l-md w-64">
                <!--<a href="<?php echo e(route('dashboard')); ?>" class="bg-red-500 text-white px-4 py-2 ml-0.5">&times;</a>-->
                <button class="bg-blue-500 text-white px-3 py-2 rounded-r-md"><span class="material-symbols-outlined">search</span></button>
            </div>
        </form>

        <div class="container mx-auto px-4">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class="text-2xl font-extrabold text-gray-500 mt-8 mb-4 ml-4 uppercase tracking-wide font-montserrat">
                <?php echo e($categoria->categoria); ?>

            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 px-4">
                <?php $__currentLoopData = $categoria->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <a href="<?php echo e(route('producto.show', $producto)); ?>"
                        class="bg-white rounded-lg p-4 flex flex-col items-center hover:bg-dbb6ee transition duration-300 ease-in-out transform hover:-translate-y-1">
                        <div class="relative">
                            <img src="<?php echo e(asset('storage/'. $producto->imagen1)); ?>" alt="Foto del producto" class="w-full h-40 object-contain">
                            <div class="absolute top-2 right-2 py-1 px-1 rounded-full text-xs font-bold
                                <?php if($producto->stock > 0): ?>
                                    bg-green-500 text-white
                                <?php else: ?>
                                    bg-red-500 text-white
                                <?php endif; ?>
                            ">
                                <?php if($producto->stock > 0): ?>
                                    <?php echo e($producto->stock); ?> disponibles
                                <?php else: ?>
                                    Agotado
                                <?php endif; ?>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-black my-2"><?php echo e($producto->nombre); ?></h3>
                        <p class="text-gray-500"><?php echo e($producto->descripcion); ?></p>
                        <p class="text-black font-bold text-xl my-2">Bs. <?php echo e(number_format($producto->precio, 2)); ?></p>
                        <button class="mt-4 py-2 px-4
                            <?php if($producto->stock > 0): ?>
                                bg-green-500 text-white rounded-full hover:bg-green-600 hover:bg-green-600
                                transition duration-300 ease-in-out
                            <?php else: ?>
                                bg-red-500 text-white rounded-full hover:bg-red-600 hover:bg-red-600
                                transition duration-300 ease-in-out
                            <?php endif; ?>">
                            Comprar
                        </button>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
    </div>
</div>
<?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/components/welcome.blade.php ENDPATH**/ ?>