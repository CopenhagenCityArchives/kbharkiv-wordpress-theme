<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="container-fluid">

    <?php if(!have_posts()): ?>
      <div class="alert alert-warning">
        <?php echo e(__('Vi kunne ikke finde nogen resultater', 'sage')); ?>

      </div>
      <?php echo get_search_form(false); ?>

    <?php else: ?>
      <div class="row">
        <?php while(have_posts()): ?> <?php the_post() ?>
          <?php echo $__env->make('partials.content-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php echo pagination(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>