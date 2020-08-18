<?php $__env->startSection('content'); ?>
  <?php echo e(the_breadcrumb()); ?>


  <?php while(have_posts()): ?> <?php the_post() ?>
    <?php echo $__env->make('partials.content-single-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.modules', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.tags', ['container' => true, 'class' => 'd-xl-none'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.nav-post', ['container' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php endwhile; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>