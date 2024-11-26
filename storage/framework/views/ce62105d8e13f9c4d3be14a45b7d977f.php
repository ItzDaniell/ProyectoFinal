<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Editar Noticia</h2>
<form action="<?php echo e(route('noticias.update', $noticia->id_noticia)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
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
        <label for="titulo" class="block text-sm font-medium text-gray-700">Titulo de la Noticia</label>
        <input type="text" name="titulo" required value="<?php echo e($noticia->titulo); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>

    <div>
        <label for="autor" class="block text-sm font-medium text-gray-700">Autor de la Noticia</label>
        <input type="text" name="autor" required value="<?php echo e($noticia->autor); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>

    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion de la Noticia</label>
        <textarea type="text" rows="4" name="descripcion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"><?php echo e($noticia->descripcion); ?> </textarea>
    </div>

    <div>
        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen de la Noticia</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4" onchange="previewImage(event)">
        <div class="mt-4">
            <img id="preview" src="<?php echo e(Storage::url($noticia->imagen)); ?>" alt="Imagen de la Noticia" class="w-64 h-64 object-cover border border-gray-300">
        </div>
    </div>

    <div>
        <label for="url" class="block text-sm font-medium text-gray-700">URL de la Noticia</label>
        <input type="text" name="URL" required value="<?php echo e($noticia->URL); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>

    <div>
        <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
        <select name="id_categoria" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            <option value="">[ SELECCIONE ]</option>
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id_categoria); ?>" <?php echo e($noticia->id_categoria == $categoria->id_categoria ? 'selected' : ''); ?>>
                    <?php echo e($categoria->descripcion); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div>
        <label for="estado" class="block text-sm font-medium text-gray-700">Estado de la Noticia</label>
        <select name="estado" id="estado" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            <option value="Activo" <?php echo e($noticia->estado == 'Activo' ? 'selected' : ''); ?>>Activo</option>
            <option value="Borrador" <?php echo e($noticia->estado == 'Borrador' ? 'selected' : ''); ?>>Borrador</option>
            <option value="Inactivo" <?php echo e($noticia->estado == 'Inactivo' ? 'selected' : ''); ?>>Inactivo</option>
        </select>
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <a href="<?php echo e(route('noticias.index')); ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.classList.add('hidden');
            }
        }
    
        function clearPreview() {
            const preview = document.getElementById('preview');
            preview.src = "#";
            preview.classList.add('hidden');
            document.getElementById('imagen').value = "";
        }
    </script>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/noticia/edit.blade.php ENDPATH**/ ?>