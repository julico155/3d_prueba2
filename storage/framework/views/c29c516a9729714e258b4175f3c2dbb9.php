

<?php $__env->startSection('producto'); ?>
    <div class="container mx-auto px-4 my-4">
        <div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-1/2 mx-auto">
            <h2 class="text-2xl font-bold mb-4">Generar Imagen con IA</h2>
            <form id="iaForm" action="<?php echo e(route('generarImagenIA')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="producto_id" id="producto_id" value="<?php echo e($producto->id); ?>">
                <div class="mb-4">
                    <label for="prompt" class="block text-gray-700 text-sm font-bold mb-2">Prompt:</label>
                    <input type="text" name="prompt" id="prompt" value="Parque con vista al lago" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Generar Imagen
                    </button>
                    <a href="<?php echo e(route('producto.index')); ?>" class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancelar
                    </a>
                </div>
            </form>
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Imagen Generada</h2>
                <canvas id="imageCanvas" class="border rounded-lg"></canvas>
            </div>
            <div class="mt-4">
                <form id="saveImageForm" action="<?php echo e(route('guardarImagenIA')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="producto_id" id="save_producto_id" value="<?php echo e($producto->id); ?>">
                    <input type="hidden" name="image_url" id="image_url">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Guardar Imagen
                    </button>
                </form>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('iaForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const prompt = document.getElementById('prompt').value;
            const producto_id = document.getElementById('producto_id').value;

            fetch('<?php echo e(route("generarImagenIA")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ prompt, producto_id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const canvas = document.getElementById('imageCanvas');
                    const ctx = canvas.getContext('2d');
                    const img = new Image();
                    img.onload = function() {
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0);
                        document.getElementById('saveImageForm').style.display = 'block';
                        document.getElementById('image_url').value = data.image_url;
                    };
                    img.src = data.image_url;
                } else {
                    alert('Error generando la imagen con IA: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error generando la imagen con IA.');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/VistaProductos/genform.blade.php ENDPATH**/ ?>