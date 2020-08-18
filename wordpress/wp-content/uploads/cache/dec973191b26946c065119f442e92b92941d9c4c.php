<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="container-fluid">

    <?php if(!have_posts()): ?>
      <div class="alert alert-warning">
        <?php echo e(__('Vi har ingen fremtidige arrangementer i øjeblikket.', 'kbharkiv')); ?>

      </div>
      <?php echo get_search_form(false); ?>

    <?php else: ?>
      <?php $prev_date = null ?>
      <?php while(have_posts()): ?> <?php the_post() ?>
        <?php echo $__env->make('partials.content-'.get_post_type(), ['prev_date' => $prev_date], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $prev_date = strtotime(get_field('event_start')) ?>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>

  <?php echo pagination(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>