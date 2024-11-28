<?php $__env->startSection('title', 'Iniciar Sesión'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-form">
    <div class="container-info">
        <h1>¡Bienvenido!</h1>
        <span>Ingresa tus datos personales para ingresar a la plataforma,
        si no tienes registrada una cuenta ¡Hazlo Ahora!</span>
        <div class="enlace">
            <a href="<?php echo e(route('Registrarse')); ?>" class="boton">Registrarse</a>
        </div>
    </div>
    <div class="form-container">
        <h1>Iniciar Sesión</h1>
        <?php $__sessionArgs = ['status'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
            <div class="status-message">
                <?php echo e($value); ?>

            </div>
        <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>
        <?php if (isset($component)) { $__componentOriginalb24df6adf99a77ed35057e476f61e153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb24df6adf99a77ed35057e476f61e153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'error-messages']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'error-messages']); ?>
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

        <form method="POST" action="<?php echo e(route('login')); ?>" class="login-form">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="email" class="form-label"><?php echo e(__('Email')); ?></label><br>
                <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="password" class="form-label"><?php echo e(__('Contraseña')); ?></label><br>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password">
                <ion-icon name="key-outline"></ion-icon>
            </div>

            <div class="form-group remember-me">
                <input type="checkbox" id="remember_me" name="remember" class="remember-checkbox">
                <label for="remember_me" class="remember-label">
                    <?php echo e(__('Mantener la sesión activa')); ?>

                </label>
            </div>

            <div class="form-actions">
                <button class="submit-button">
                    <?php echo e(__('Iniciar Sesión')); ?>

                </button><br>
                <?php if(Route::has('password.request')): ?>
                    <a class="forgot-password-link" href="<?php echo e(route('OlvidasteContraseña')); ?>">
                        <?php echo e(__('¿Olvidaste tu Contraseña?')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </form>    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\liamg\OneDrive\Escritorio\INTEGRADOR3C\ProyectoFinal\resources\views/PreRegistro/IniciarSesion.blade.php ENDPATH**/ ?>