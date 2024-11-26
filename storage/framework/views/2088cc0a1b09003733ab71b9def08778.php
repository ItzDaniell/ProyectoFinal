<?php $__env->startSection('title', 'Iniciar Sesión'); ?>

<?php $__env->startSection('content'); ?>

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div
        class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-6 md:p-8 flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-8">
        <div
            class="w-full md:w-1/2 bg-yellow-500 text-white p-6 md:p-8 rounded-lg flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl font-bold mb-4">¡Bienvenido!</h1>
            <p class="mb-6">Ingresa tus datos personales para ingresar a la plataforma. Si no tienes registrada una
                cuenta, ¡Hazlo Ahora!</p>
            <a href="<?php echo e(route('Registrarse')); ?>"
                class="bg-white text-yellow-500 py-2 px-4 rounded hover:bg-yellow-600 ">Registrarse</a>
        </div>

        <div class="w-full md:w-1/2">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Iniciar Sesión</h1>

            <?php $__sessionArgs = ['status'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    <?php echo e($value); ?>

                </div>
            <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

            <?php if (isset($component)) { $__componentOriginalb24df6adf99a77ed35057e476f61e153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb24df6adf99a77ed35057e476f61e153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $attributes = $__attributesOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__attributesOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $component = $__componentOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__componentOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="email" type="email" name="email" class="flex-1 outline-none" required autofocus
                            autocomplete="username">
                        <ion-icon name="mail-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="password" type="password" name="password" class="flex-1 outline-none" required
                            autocomplete="current-password">
                        <ion-icon name="key-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                <div class="flex items-center mt-4">
                    <input type="checkbox" id="remember_me" name="remember" class="mr-2 rounded border-gray-300">
                    <label for="remember_me" class="text-sm text-gray-700">Mantener la sesión activa</label>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">Iniciar
                        Sesión</button>
                </div>

                <?php if(Route::has('password.request')): ?>
                 <!--   <p class="mt-4 text-center text-gray-600">
                        <a href="<?php echo e(route('OlvidasteContraseña')); ?>" class="text-blue-500 underline">¿Olvidaste tu
                            Contraseña?</a>
                    </p>  -->
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/auth/login.blade.php ENDPATH**/ ?>