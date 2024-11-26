<?php $__env->startSection('title', 'Editar Estado'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Editar Estado de Publicación</h2>
<form action="<?php echo e(route('publicacion.update', $publicacion->id_publicacion)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
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
        <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre del Usuario</label>
        <input type="text" name="nombres" value="<?php echo e($publicacion->users->name); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>
        
    <div>
        <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria de la Publicación</label>
        <input type="text" name="categoria" value="<?php echo e($publicacion->categoria->descripcion); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>

    <div>
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título de la Publicación</label>
        <input type="text" name="titulo" value="<?php echo e($publicacion->titulo); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>
        
    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="descripcion" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly><?php echo e($publicacion->descripcion); ?></textarea>
    </div>

    <div>
        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen de la Publicación</label>
        <?php if($publicacion->imagen == 'Sin Imagen'): ?>
            <input type="text" name="imagen" required value="<?php echo e($publicacion->imagen); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
        <?php else: ?>
            <div class="mt-4">
                <img src="<?php echo e(asset('storage/' . $publicacion->imagen)); ?>" alt="Imagen de la Publicación" class="w-64 h-64 object-cover border border-gray-300">
            </div>
        <?php endif; ?>
    </div>

    <div>
        <label for="estado" class="block text-sm font-medium text-gray-700">Estado de la Publicación</label>
        <select name="estado" id="estado" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            <option value="Activo" <?php echo e($publicacion->estado == 'Activo' ? 'selected' : ''); ?>>Activo</option>
            <option value="Inactivo" <?php echo e($publicacion->estado == 'Inactivo' ? 'selected' : ''); ?>>Inactivo</option>
        </select>
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
        <a href="<?php echo e(route('publicacion.index')); ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/publicacion/edit.blade.php ENDPATH**/ ?>