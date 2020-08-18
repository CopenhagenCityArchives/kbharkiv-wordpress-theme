<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php if(!have_posts()): ?>
    <div class="container-fluid">
      <div class="alert alert-warning">
        <?php echo e(__('Siden eksisterer ikke.', 'sage')); ?>

      </div>
      <?php echo get_search_form(false); ?>

    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>