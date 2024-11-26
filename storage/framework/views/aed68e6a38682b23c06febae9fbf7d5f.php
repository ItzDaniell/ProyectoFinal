<?php $__env->startSection('title', 'Configuración de Sesiones Activas'); ?>

<?php $__env->startSection('content'); ?>
<div class="sidebar-configuracion">
    <div class="wrapper-configuracion">
        <div class="encabezado">
            <span>Configuración</span>
        </div>
        <div class="links">
            <button class="link">
                <ion-icon name="person-circle-outline"></ion-icon>
                <a href="<?php echo e(route('Configuracion')); ?>">Editar Perfil</a>
            </button>
            <button class="link">
                <ion-icon name="shield-outline"></ion-icon>
                <a href="<?php echo e(route('ConfiguracionSeguridad')); ?>">Seguridad</a>
            </button>
            <button class="link">
                <ion-icon name="laptop-outline"></ion-icon>
                <a href="<?php echo e(route('ConfiguracionSesionesActivas')); ?>">Sesiones Activas</a>
            </button>
            <button class="link">
                <ion-icon name="file-tray-full-outline"></ion-icon>
                <a href="<?php echo e(route('Conferencias')); ?>">Solicitudes Enviadas</a>
            </button>
            <button class="link">
                <ion-icon name="trash-outline"></ion-icon>
                <a href="<?php echo e(route('ConfiguracionEliminarCuenta')); ?>">Eliminar Cuenta</a>
            </button>
            <div class="divider"></div>
            <button class="link">
                <ion-icon name="mail-outline"></ion-icon>
                <a href="<?php echo e(route('PerfilUsuario')); ?>">Solicitar Rol Empresa</a>
            </button>
            <button class="link">
                <ion-icon name="alert-circle-outline"></ion-icon>
                <a href="#">Informar un Problema</a>
            </button>
        </div>
    </div>
</div>
<div class="content">
    <div class="contenedor">
        <div class="content-encabezado">
            <h1>Sesiones Activas</h1>
        </div>
        <div class="editarperfil">
            <div>
                <div class="">
                    <div class="mt-10 sm:mt-0">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.logout-other-browser-sessions-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2775025880-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.postiniciolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/PostInicioSesion/ConfiguracionSesionesActivas.blade.php ENDPATH**/ ?>