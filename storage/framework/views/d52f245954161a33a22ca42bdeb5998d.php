<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'Desbanear Usuario'); ?>
<h2 class="text-2xl font-bold mb-4">Desbanear Usuario</h2>
<form action="<?php echo e(route('usuarios.desbanned', $usuario->id)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div>
        <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres del Usuario</label>
        <input type="text" name="nombres" value="<?php echo e($usuario->name); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1 " readonly>
    </div>
    
    <div>
        <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="email" name="correo" value="<?php echo e($usuario->email); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>
    
    <div>
        <label for="comment" class="block text-sm font-medium text-gray-700">Comentarios</label>
        <textarea name="comment" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly><?php echo e($ban ? $ban->comment : 'No hay comentarios disponibles'); ?></textarea>
    </div>

    <div>
        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
        <input type="text" name="estado" value="<?php echo e($usuario->estado); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly></input>
    </div>

    <?php if($usuario->estado == 'Baneado Temporalmente'): ?>
    <div>
        <label for="fecha_baneo" class="block text-sm font-medium text-gray-700">Fecha de Baneo Temporal</label>
        <input type="date" name="fecha_baneo" value="<?php echo e($ban && $ban->expired_at ? $ban->expired_at->format('Y-m-d') : ''); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>
    <?php endif; ?>

    <div>
        <label for="desbanear" class="inline-flex items-center">
            <input type="checkbox" name="CheckDesbaneo" value="1" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <span class="ml-2 text-sm font-medium text-gray-700">Confirme el desbaneo del usuario Usuario</span>
        </label>
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Desbanear</button>
        <a href="<?php echo e(route('usuarios.bans')); ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/baneado/edit.blade.php ENDPATH**/ ?>