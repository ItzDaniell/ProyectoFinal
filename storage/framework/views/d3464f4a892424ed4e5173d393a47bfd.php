<?php if($errors->any()): ?>
    <div <?php echo e($attributes); ?>>
        <div class=""><?php echo e(__('Whoops! Algo anda mal...')); ?></div>

        <ul class="">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\liamg\OneDrive\Escritorio\INTEGRADOR3C\ProyectoFinal\resources\views/components/validation-errors.blade.php ENDPATH**/ ?>