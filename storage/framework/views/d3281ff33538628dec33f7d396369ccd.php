<?php $__env->startSection('title', 'Agregar Categoria'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Agregar Categoria</h2>
<form action="<?php echo e(route('categorias.store')); ?>" method="POST" class="space-y-4">
    <?php echo csrf_field(); ?>
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
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion de la Categoría</label>
        <input type="text" name="descripcion" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
        <a href="<?php echo e(route('categorias.index')); ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/categoria/create.blade.php ENDPATH**/ ?>