

<?php $__env->startSection('title', 'Agregar Noticia'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-2xl font-bold mb-4">Agregar Noticia</h2>
<form action="<?php echo e(route('noticias.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
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
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" name="titulo" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
        <input type="text" name="autor" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="descripcion" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"></textarea>
    </div>
    
    <div>
        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
        <input type="file" id="imagen" required name="imagen" accept="image/*" class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4" onchange="previewImage(event)">
        <div class="mt-4">
            <img id="preview" src="#" alt="Imagen de la Noticia" class="hidden w-64 h-64 object-cover border border-gray-300">
        </div>
    </div>
    
    <div>
        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
        <input type="url" name="URL" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>

    <div>
        <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
        <select name="id_categoria" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            <option value="">[ SELECCIONE ]</option>
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id_categoria); ?>"><?php echo e($categoria->descripcion); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    
    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
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
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/noticia/create.blade.php ENDPATH**/ ?>