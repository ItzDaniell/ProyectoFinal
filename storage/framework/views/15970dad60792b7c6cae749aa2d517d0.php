<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title', 'Editar Rol de Usuario'); ?>
<h2 class="text-2xl font-bold mb-4">Editar Rol de Usuario</h2>
<form action="<?php echo e(route('usuarios.update', $usuario->id)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
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
        <label for="name" class="block text-sm font-medium text-gray-700">Nombres del Usuario</label>
        <input type="text" name="name" required value="<?php echo e($usuario->name); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>

    <div>
        <label for="autor" class="block text-sm font-medium text-gray-700">Correo del Usuario</label>
        <input type="text" name="autor" required value="<?php echo e($usuario->email); ?>" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>

    <div>
        <label for="profile_photo_pat" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
        <div class="mt-4">
            <img id="preview" src="<?php echo e(asset('storage/' . $usuario->profile_photo_path)); ?>" alt="Foto del Usuario" class="w-32 h-32 object-cover border border-gray-300 rounded-full">
        </div>
    </div>

    <div>
        <label for="rol" class="block text-sm font-medium text-gray-700">Rol del Usuario</label>
        <select name="rol" id="rol" required
                class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($rol); ?>" <?php echo e($usuario->hasRole($rol) ? 'selected' : ''); ?>>
                    <?php echo e(ucfirst($rol)); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <a href="<?php echo e(route('usuarios.index')); ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
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
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/usuario/edit.blade.php ENDPATH**/ ?>