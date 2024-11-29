<?php $__env->startSection('title', 'DevShare - Administración'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>¡Hola <?php echo e(auth()->user()->name); ?>!</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p>Bienvenido al panel de Administración</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\davil\OneDrive\Desktop\ProyectoFinal\resources\views/PostInicioSesion/Administracion.blade.php ENDPATH**/ ?>