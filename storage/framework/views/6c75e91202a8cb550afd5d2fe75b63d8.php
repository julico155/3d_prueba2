<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu Página</title>
    <script src="https://cdn.babylonjs.com/babylon.js"></script>
    <script src="https://cdn.babylonjs.com/loaders/babylon.objFileLoader.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #renderCanvas {
            width: 100%;
            height: 100%;
        }
    </style>
    <!-- Agregar en la cabecera de tu plantilla principal si Bootstrap no está incluido -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery y Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>


<?php $__env->startSection('cliente'); ?>
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded p-4 lg:p-8">
            <div class="text-center">
                <a href="<?php echo e(route('welcome')); ?>">
                    <h2 class="text-4xl text-black font-bold mb-6">Refracgas</h2>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
                <!-- Carrusel de imágenes y video -->
                <div>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php $__currentLoopData = [$p->imagen1, $p->imagen2, $p->imagen3, $p->imagen4]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                                    <img src="<?php echo e(asset( 'storage/' . $image)); ?>" class="d-block w-100" alt="Foto del producto <?php echo e($index + 1); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($p->video): ?>
                                <div class="carousel-item">
                                    <video class="d-block w-100" controls>
                                        <source src="<?php echo e(asset('storage/' . $p->video)); ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            <?php endif; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
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
                        <!-- Botón para abrir el modal, con ruta del modelo 3D -->
                        
                        <?php if($p->es_3d): ?>
                            <button type="button" class="bg-blue-500 text-white font-bold py-2 px-4 rounded" data-toggle="modal" data-target="#model3DModal">
                                Ver en 3D
                            </button>                        
                            <p class="text-sm text-gray-600">Descripción: <?php echo e($p->descripcion_3d); ?></p>
                            <p class="text-sm text-gray-600">Precio del modelo 3D: <?php echo e($p->precio_3d); ?></p>
                            <?php if($p->es_formato_obj): ?>
                            <p class="text-sm text-gray-600">-Formato: Obj</p>
                            <?php endif; ?>
                            <?php if($p->es_formato_gltf): ?>
                            <p class="text-sm text-gray-600">-Formato gltF</p>
                            <?php endif; ?>
                            <?php if($p->es_formato_fbx): ?>
                            <p class="text-sm text-gray-600">-Formato FBX</p>
                            <?php endif; ?>
                            <?php if($p->es_formato_stl): ?>
                            <p class="text-sm text-gray-600">-Formato STL</p>
                            <?php endif; ?>
                            <form action="<?php echo e(route('session2')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="producto" hidden value="<?php echo e($p->id); ?>">
                                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                                    Comprar modelo 3D ahora
                                </button>
                            </form>                            
                        <?php endif; ?>
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

    <!-- Modal for 3D Model Viewing -->
    <div class="modal fade" id="model3DModal" tabindex="-1" role="dialog" aria-labelledby="model3DModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="model3DModalLabel">Modelo 3D</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="renderCanvas"></canvas>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#model3DModal').on('shown.bs.modal', function () {
            const canvas = document.getElementById('renderCanvas');
            if (!canvas) {
                console.error('3D canvas not found');
                return;
            }

            // Crear el engine y la escena
            const engine = new BABYLON.Engine(canvas, true);
            const scene = new BABYLON.Scene(engine);

            // Crear la cámara
            const camera = new BABYLON.ArcRotateCamera("camera", Math.PI / 2, Math.PI / 2, 2, new BABYLON.Vector3(0, 0, 0), scene);
            camera.attachControl(canvas, true);

            // Crear la luz
            const light = new BABYLON.HemisphericLight("light", new BABYLON.Vector3(1, 1, 0), scene);

            // Cargar el modelo
            const modelPath = `<?php echo e(asset('storage/' . $p->archivo_3d)); ?>`;
            BABYLON.SceneLoader.Append("", modelPath, scene, function (scene) {
                // El modelo se ha cargado correctamente
                engine.runRenderLoop(function () {
                    scene.render();
                });
            }, null, function (scene, message) {
                console.error('Error loading model:', message);
            });

            // Ajustar el tamaño del canvas al cambiar el tamaño de la ventana
            window.addEventListener('resize', function () {
                engine.resize();
            });

            // Cleanup on modal close
            $('#model3DModal').on('hidden.bs.modal', function () {
                engine.dispose();
            });
        });
    });
</script>
</body>
</html>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/VistaEmpresa/productoShow.blade.php ENDPATH**/ ?>