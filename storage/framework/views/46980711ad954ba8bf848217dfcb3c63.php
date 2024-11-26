<?php $__env->startSection('title', 'Lista de Ponentes'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Lista de Ponentes</h2>
<div class="flex justify-between mb-4">
    <a href="<?php echo e(route('conferencias.index')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lista de Conferencias</a>
    <a href="<?php echo e(route('ponentes.create')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Ponente</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Nombres</th>
                <th class="px-4 py-2 border">Correo Electrónico</th>
                <th class="px-4 py-2 border">Biografía</th>
                <th class="px-4 py-2 border">Foto</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $ponentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ponente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border"><?php echo e($ponente->nombres); ?></td>
                <td class="px-4 py-2 border"><?php echo e($ponente->correo); ?></td>
                <td class="px-4 py-2 border"><?php echo e(Str::limit($ponente->biografia, 30)); ?></td>
                <td class="px-4 py-2 border">
                    <a href="<?php echo e(asset('storage/' . $ponente->foto)); ?>" target="_blank" class="text-blue-500 hover:underline">Ver Foto</a>
                </td>
                <td class="px-4 py-2 border">
                    <div class="flex justify-between gap-2">
                        <a href="<?php echo e(route('ponentes.edit', $ponente->id_ponente)); ?>" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                            Editar
                        </a>
                        <a href="<?php echo e(route('ponentes.show', $ponente->id_ponente)); ?>" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                            Ver
                        </a>
                    </div>
                </td>
            </tr>             
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="mt-4">
    <?php echo e($ponentes->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/ponente/index.blade.php ENDPATH**/ ?>