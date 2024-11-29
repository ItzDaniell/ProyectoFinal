<?php $__env->startSection('title', 'DevShare - Usuarios'); ?>

<?php $__env->startSection('content_header'); ?>
    <h2 class="text-3xl font-bold mb-4">Usuarios Registrados</h2>
    <a href="<?php echo e(route('usuarios.bans')); ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-1 inline-block">Lista de Usuarios Baneados</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="flex-1 bg-gray-100 overflow-y-auto h-screen">
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
</div>
<div>
    <?php echo e($usuarios->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/usuario/index.blade.php ENDPATH**/ ?>