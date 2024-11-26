<?php $__env->startSection('title', 'Perfil de Usuario'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50 flex items-start p-8">
    <div class="w-full max-w-7xl bg-white p-8 rounded-lg shadow-lg relative">
        <!-- Encabezado del Perfil -->
        <div class="content-encabezado mb-8 flex justify-between items-center">
            <h1 class="text-4xl font-bold text-black">Perfil de Usuario</h1>
            <div class="relative">
                <button id="optionsButton" class="text-gray-500 text-xl">
                    <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                </button>
                <!-- Menú de opciones -->
                <div id="optionsMenu" class="absolute right-0 mt-2 w-48 bg-gray-200 rounded-lg shadow-lg hidden">
                    <ul class="text-center">
                        <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                            <a href="<?php echo e(route('Configuracion')); ?>" class="w-full block px-4 py-2 text-left">Configurar
                                Cuenta</a>
                        </li>
                        <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="w-full text-left px-4 py-2">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Información del Usuario -->
        <div class="flex items-start space-x-6 mb-10">
            <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0">
                <?php if($usuario->profile_photo_path): ?>
                    <img class="w-full h-full object-cover" src="<?php echo e(asset('storage/' . $usuario->profile_photo_path)); ?>"
                        alt="Foto de perfil del usuario">
                <?php elseif(Auth::check() && Auth::user()->avatar): ?>
                    <img class="w-full h-full object-cover" src="<?php echo e(Auth::user()->avatar); ?>"
                        alt="Foto de perfil del usuario">
                <?php else: ?>
                    <img class="w-full h-full object-cover" src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                        alt="Foto de perfil predeterminada">
                <?php endif; ?>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-black"><?php echo e($usuario->name); ?></h2>
                <p class="text-gray-500"><?php echo e($usuario->estado ?? 'Nada Aun por el momento.'); ?></p>
                <p class="text-gray-700 font-semibold">Rol: <?php echo e($usuario->rol); ?></p>
            </div>
        </div>

        <!-- Presentación y Biografía -->
        <div class="border-t border-gray-300 pt-6">
            <!-- Presentación -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4">Presentación</h3>
                <p class="text-gray-700"><?php echo e(Auth::user()->presentacion ?? 'No hay presentación disponible.'); ?></p>
            </div>

            <!-- Biografía -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Biografía</h3>
                <p class="text-gray-700"><?php echo e(Auth::user()->biografia ?? 'No hay biografía disponible.'); ?></p>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\davil\OneDrive\Desktop\ProyectoFinal\resources\views/PostInicioSesion/PerfilUsuario.blade.php ENDPATH**/ ?>