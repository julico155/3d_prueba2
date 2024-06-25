

<?php $__env->startSection('cliente'); ?>
    <div class="container mx-auto mt-8 container-printable p-5">
        <h2 class="text-3xl font-semibold text-center mb-4">Historial de Compras de Clientes</h2>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="imprimirBtn">Imprimir</button>
        <table class="min-w-full border border-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="bg-gray-100 text-left px-6 py-3">Cliente</th>
                    <th class="bg-gray-100 text-left px-6 py-3">Fecha</th>
                    <th class="bg-gray-100 text-left px-6 py-3">Producto</th>
                    <th class="bg-gray-100 text-left px-6 py-3">Cantidad</th>
                    <th class="bg-gray-100 text-left px-6 py-3">Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $compra['productos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border-t px-6 py-4"><?php echo e($compra['cliente']); ?></td>
                            <td class="border-t px-6 py-4"><?php echo e($compra['fecha']); ?></td>
                            <td class="border-t px-6 py-4"><?php echo e($producto->nombre); ?></td>
                            <td class="border-t px-6 py-4"><?php echo e($producto->cantidad); ?></td>
                            <td class="border-t px-6 py-4">BOB <?php echo e(number_format($producto->precio_total, 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<script>
    function imprimirCompras() {
        var contenido = document.querySelector(".container-printable").innerHTML;
        var ventana = window.open("", "_blank");
        ventana.document.write('<html><head><title>Impresión</title><link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"><style>body {font-family: Arial, sans-serif;} .header {text-align: center; margin-bottom: 20px;} .header h1 {font-size: 24px; font-weight: bold; color: #3B82F6;} .header p {font-size: 16px; color: #6B7280;} table {border-collapse: separate; border-spacing: 0; width: 100%;} th, td {border: 1px solid #e5e7eb; padding: 12px; text-align: center; font-size: 14px;} th {background-color: #FCE7D4;} .bg-gray-100 {background-color: #F9FAFB;} .bg-blue-500 {background-color: #3B82F6; color: #fff;} .bg-blue-500:hover {background-color: #2563eb;}</style></head><body class="bg-gray-100"><div class="header"><h1>STYLO STORE</h1><p>Ubicación: Av. Libertad C/Angostura #23</p><p>Numero de Contacto: (+591) 70001234</p></div>' + contenido + '</body></html>');
        ventana.document.close();
        ventana.print();
        ventana.close();
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('imprimirBtn').addEventListener('click', imprimirCompras);
    });
</script>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Proyectos\SI2\TiendaRopa\resources\views/compraclientes.blade.php ENDPATH**/ ?>