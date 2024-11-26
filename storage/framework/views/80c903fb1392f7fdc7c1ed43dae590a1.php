<?php $__env->startSection('title', 'Lista de Categorias'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Lista de Categorias</h2>
<div class="flex justify-between mb-4">
    <a href="<?php echo e(route('categorias.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Categoría</a>
</div>
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">ID_Categoria</th>
                <th class="px-4 py-2 border">Descripcion</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border"><?php echo e($categoria->id_categoria); ?></td>
                <td class="px-4 py-2 border"><?php echo e($categoria->descripcion); ?></td>
                <td class="px-4 py-2 border">
                    <div class="flex justify-between gap-2">
                        <a href="<?php echo e(route('categorias.edit', $categoria->id_categoria)); ?>" 
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/categoria/index.blade.php ENDPATH**/ ?>