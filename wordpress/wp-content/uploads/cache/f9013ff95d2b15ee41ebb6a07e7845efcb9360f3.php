<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Sorry, no results were found.', 'sage')); ?>

    </div>
    <?php echo get_search_form(false); ?>

  <?php endif; ?>

  <div class="container-fluid">
      <?php $prev_date = null ?>
      <?php while(have_posts()): ?> <?php the_post() ?>
        <?php echo $__env->make('partials.content-'.get_post_type(), ['prev_date' => $prev_date], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $prev_date = strtotime(get_field('event_start')) ?>
      <?php endwhile; ?>
  </div>

  <?php echo get_the_posts_navigation(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>