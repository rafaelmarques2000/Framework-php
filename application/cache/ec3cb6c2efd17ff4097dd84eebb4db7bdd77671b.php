<?php $__env->startSection('content'); ?>

<div class="welcome-content">
         <h1>Atenção</h1>
         <p><?php echo e($info); ?></p>
         <p><a class ="btn btn-secondary" href="<?php echo e($link); ?>">Voltar</a></p>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Framework-php/application/modules/manager/views/msg.blade.php ENDPATH**/ ?>