<?php $__env->startSection('title', 'Noticias'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Noticias</h1>
        <div class="flex space-x-4 relative">
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <div id="searchDropdown" class="hidden absolute right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <p class="text-sm pb-2">Buscar Noticia por título</p>
                    <form action="<?php echo e(route('Noticias')); ?>" method="get" class="flex">
                        <input name="busqueda" type="text" placeholder="Buscar por Título..." class="w-full p-2 border rounded-md text-sm mr-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                    </form>
                </div>
            </div>
            <div class="relative">
                <ion-icon name="funnel-outline" class="text-2xl cursor-pointer" id="filterIcon"></ion-icon>
                <div id="filterDropdown" class="hidden absolute right-0 w-80 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <div class="flex flex-col space-y-2">
                        <p class="text-sm">Filtrar por Categoría</p>
                        <form action="<?php echo e(route('Noticias')); ?>" method="get" class="flex flex-col space-y-3">
                            <select name="categoria" class="p-2 border rounded-md text-sm">
                                <option value="0">[ SELECCIONE ]</option>
                                <option value="0">Mostrar Todo</option>
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categoria->descripcion); ?>"><?php echo e($categoria->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($noticias->count() != 0): ?>
    <!-- Última noticia destacada -->
    <?php $ultimaNoticia = $noticias->first(); ?>
    <!-- Noticia principal -->
    <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden mb-4">
        <div class="flex flex-col md:flex-row">
            <img src="<?php echo e(asset('storage/' . $ultimaNoticia->imagen)); ?>" alt="Noticia Principal" class="w-full h-80 md:w-1/2 object-cover">
            <div class="p-4 md:w-1/2">
                <h2 class="text-2xl font-bold mb-2"><?php echo e($ultimaNoticia->titulo); ?></h2>
                <p class="text-gray-500 font-semibold mb-2"><?php echo e($ultimaNoticia->categoria->descripcion); ?></p>
                <p class="text-gray-700 mb-4"><?php echo e(Str::limit($ultimaNoticia->descripcion, 200)); ?></p>
                <a href="<?php echo e(route('DetalleNoticia', urlencode($ultimaNoticia->titulo))); ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="<?php echo e(asset('storage/' . $noticia->imagen)); ?>" alt="Noticia 1" class="w-full h-80 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2"><?php echo e($noticia->titulo); ?></h3>
                <p class="text-gray-700 mb-4"><?php echo e($noticia->categoria->descripcion); ?></p>
                <a href="<?php echo e(route('DetalleNoticia', urlencode($noticia->titulo))); ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/js/mostrar_modal_busq_cat.js'); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/PostInicioSesion/Noticias.blade.php ENDPATH**/ ?>