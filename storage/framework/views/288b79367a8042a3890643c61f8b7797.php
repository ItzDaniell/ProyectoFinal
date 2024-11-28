<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'Lista de Usuarios'); ?>
<h2 class="text-2xl font-bold mb-4">Lista de Usuarios</h2>
<a href="<?php echo e(route('usuarios.bans')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Lista de Usuarios Baneados</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Nombre</th>
                <th class="px-4 py-2 border">Correo Electrónico</th>
                <th class="px-4 py-2 border">Foto de Perfil</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Rol</th>
                <th class="px-4 py-2 border text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border"><?php echo e($usuario->name); ?></td>
                <td class="px-4 py-2 border"><?php echo e($usuario->email); ?></td>
                <td class="px-4 py-2 border">
                    <a href="<?php echo e(asset('storage/' . $usuario->profile_photo_path)); ?>" target="_blank" class="text-blue-500 hover:underline">Ver Foto</a>
                </td>
                <td class="px-4 py-2 border"><?php echo e(Str::limit($usuario->estado, 12)); ?></td>
                <td class="px-4 py-2 border"><?php echo e($usuario->rol); ?></td>
                <td class="px-4 py-2 border">
                    <div class="flex justify-between gap-2">
                        <a href="<?php echo e(route('usuarios.edit', $usuario->id)); ?>" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                            Editar
                        </a>
                        <a href="<?php echo e(route('usuarios.ban', $usuario->id)); ?>" 
                           class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm text-center">
                            Banear
                        </a>
                    </div>
                </td>
            </tr>             
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div class="mt-4">
    <?php echo e($usuarios->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\davil\OneDrive\Desktop\ProyectoFinal\resources\views/usuario/index.blade.php ENDPATH**/ ?>