<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Lista de Noticias</h2>
<a href="<?php echo e(route('noticias.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Agregar Noticia</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Categoría</th>
                <th class="px-4 py-2 border">Título</th>
                <th class="px-4 py-2 border">Autor</th>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Imagen</th>
                <th class="px-4 py-2 border">URL</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border"><?php echo e($noticia->categoria->descripcion); ?></td>
                <td class="px-4 py-2 border"><?php echo e($noticia->titulo); ?></td>
                <td class="px-4 py-2 border"><?php echo e($noticia->autor); ?></td>
                <td class="px-4 py-2 border"><?php echo e(Str::limit($noticia->descripcion, 50)); ?></td>
                <td class="px-4 py-2 border">
                    <a href="<?php echo e(asset('storage/' . $noticia->imagen)); ?>" target="_blank" class="text-blue-500 hover:underline">Ver Imagen</a>
                </td>
                <td class="px-4 py-2 border">
                    <a href="<?php echo e($noticia->URL); ?>" class="text-blue-500 hover:underline" target="_blank">Ver enlace</a>
                </td>
                <td class="px-4 py-2 border"><?php echo e($noticia->estado); ?></td>
                <td class="px-4 py-2 border">
                    <div class="flex justify-between gap-2">
                        <a href="<?php echo e(route('noticias.edit', $noticia->id_noticia)); ?>" 
                        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                            Editar
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div class="mt-4">
    <?php echo e($noticias->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/noticia/index.blade.php ENDPATH**/ ?>