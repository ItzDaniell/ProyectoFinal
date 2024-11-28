<?php $__env->startSection('title', 'Registrarse'); ?>

<?php $__env->startSection('content'); ?>
<?php $__sessionArgs = ['status'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
    <div class="">
        <?php echo e($value); ?>

    </div>
<?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>
<div class="container-form">
    <div class="container-info">
        <h1>¡Hola!</h1>
        <span>Registrate con tus datos personales para disfrutar de todo el contenido de nuestra plataforma. 
        Si ya tienes una cuenta registrada, inicia sesión.</span>
        <div class="enlace">
            <a href="<?php echo e(route('IniciarSesion')); ?>" class="boton">Iniciar Sesión</a>
        </div>
    </div>
    <div class="form-container">
        <h1>Crear Cuenta</h1>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'error-messages mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'error-messages mb-4']); ?>
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

        <form method="POST" action="<?php echo e(route('register')); ?>" class="registration-form">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name" class="form-label">Nombres</label><br>
                <input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                <ion-icon name="person-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label><br>
                <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username">
                <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label><br>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password">
                <ion-icon name="key-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirma la Contraseña</label><br>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>

            <?php if(Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()): ?>
                <div class="terms-group">
                    <label for="terms" class="terms-label">
                        <input type="checkbox" name="terms" id="terms" class="terms-checkbox" required>
                        <span class="terms-text">
                            <?php echo __('Acepto los :terms_of_service y la :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-link">Términos de Servicio</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-link">Política de Privacidad</a>',
                            ]); ?>

                        </span>
                    </label>
                </div>
            <?php endif; ?>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    Registrar
                </button><br>
                <a class="login-link" href="<?php echo e(route('IniciarSesion')); ?>">
                    ¿Ya estás registrado?
                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\liamg\OneDrive\Escritorio\INTEGRADOR3C\ProyectoFinal\resources\views/PreRegistro/Registrarse.blade.php ENDPATH**/ ?>