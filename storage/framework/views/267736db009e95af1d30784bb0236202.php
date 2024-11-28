<?php $__env->startSection('title', 'Configuración'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-center items-center min-h-screen bg-gray-50 py-10">
    <div class="w-full max-w-4xl space-y-10">

        <!-- Formulario de Foto de Perfil -->
        <form id="photo-form" action="<?php echo e(route('usuario.actualizarFotoPerfil')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-7xl mx-auto">
                <!-- Foto de Perfil -->
                <div class="mb-8 flex items-center justify-between w-full">
                    <div class="flex items-center">
                        <label for="profile_photo" class="cursor-pointer">
                            <img class="w-24 h-24 rounded-full object-cover mr-4 border-2 border-gray-300 hover:border-gray-500 transition"
                                src="<?php echo e(Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : (Auth::user()->avatar ?? 'https://via.placeholder.com/150')); ?>"
                                alt="Foto de perfil">
                            <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*"
                                onchange="document.getElementById('photo-form').submit();">
                        </label>
                        <span class="text-xl font-semibold"><?php echo e(Auth::user()->name); ?></span>
                    </div>
                    <label for="profile_photo" class="boton">Cambiar Foto de Perfil</label>
                </div>
            </div>
        </form>

        <!-- Formulario de Presentación y Biografía -->
        <form action="<?php echo e(route('usuario.actualizarPerfil')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-7xl mx-auto">
                <!-- Presentación y Biografía -->
                <div class="flex flex-col w-full space-y-6">
                    <!-- Presentación -->
                    <div class="w-full">
                        <label for="presentacion" class="block text-lg font-bold mb-2">Presentación</label>
                        <input type="text" id="presentacion" name="presentacion"
                            value="<?php echo e(old('presentacion', Auth::user()->presentacion ?? '')); ?>"
                            class="w-full p-4 border-2 border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Biografía -->
                    <div class="w-full">
                        <label for="biografia" class="block text-lg font-bold mb-2">Biografía</label>
                        <textarea id="biografia" name="biografia" rows="4"
                            class="w-full p-4 border-2 border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400"><?php echo e(old('biografia', Auth::user()->biografia ?? '')); ?></textarea>
                    </div>
                </div>

                <!-- Botón de Guardar Cambios -->
                <div class="flex justify-end mt-6">
                    <button type="submit" class="boton">Guardar Cambios</button>
                </div>
            </div>
        </form>

        <!-- Seguridad -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Seguridad</h1>
            </div>
            <div>
                <?php if(Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords())): ?>
                    <div class="mt-6">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-password-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2750571777-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sesiones Activas -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Sesiones Activas</h1>
            </div>
            <div class="mt-10 sm:mt-0">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.logout-other-browser-sessions-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2750571777-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>

        <!-- Eliminar Cuenta -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Eliminar Cuenta</h1>
            </div>
            <div class="mt-10 sm:mt-0">
                <?php if(Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures()): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.delete-user-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2750571777-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/PostInicioSesion/ConfiguracionPerfil.blade.php ENDPATH**/ ?>