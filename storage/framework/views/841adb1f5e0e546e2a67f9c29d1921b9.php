<?php $__env->startSection('title', 'Lista de Conferencias'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Lista de Conferencias</h2>
<div class="flex justify-between mb-4">
    <a href="<?php echo e(route('ponentes.index')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lista de Ponentes</a>
    <a href="" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Conferencia</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Ponente</th>
                <th class="px-4 py-2 border">Título</th>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Categoría</th>
                <th class="px-4 py-2 border">Tiempo</th>
                <th class="px-4 py-2 border">Fecha Inicio</th>
                <th class="px-4 py-2 border">Imagen</th>
                <th class="px-4 py-2 border">URL</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $conferencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conferencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border"><?php echo e($conferencia->pontente->nombres); ?></td>
                <td class="px-4 py-2 border"><?php echo e($conferencia->titulo); ?></td>
                <td class="px-4 py-2 border"><?php echo e(Str::limit($conferencia->descripcion, 50)); ?></td>
                <td class="px-4 py-2 border"><?php echo e($conferencia->categoria->descripcion); ?></td>
                <td class="px-4 py-2 border"><?php echo e($conferencia->tiempo); ?></td>
                <td class="px-4 py-2 border"><?php echo e($conferencia->fecha_inicio); ?></td>
                <td class="px-4 py-2 border">
                    <img src="<?php echo e(asset($conferencia->imagen)); ?>" alt="Imagen" class="w-12 h-auto">
                </td>
                <td class="px-4 py-2 border">
                    <a href="<?php echo e($conferencia->URL); ?>" class="text-blue-500 hover:underline" target="_blank">Ver enlace</a>
                </td>
                <td class="px-4 py-2 border"><?php echo e($conferencia->estado); ?></td>
                
            </tr>             
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="mt-4">
    <?php echo e($conferencias->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/conferencia/index.blade.php ENDPATH**/ ?>