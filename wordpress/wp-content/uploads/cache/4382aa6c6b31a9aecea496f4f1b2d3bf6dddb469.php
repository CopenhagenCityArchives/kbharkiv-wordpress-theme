<?php $__env->startSection('content'); ?>

  <h6>Titel</h6>
  <?php if( get_field('employee_title') ): ?>
    <?php echo e(get_field('employee_title')); ?>

  <?php endif; ?>

  <?php if(has_post_thumbnail()): ?>
    <?php the_post_thumbnail(); ?>
  <?php endif; ?>


  <?php while(have_posts()): ?> <?php the_post() ?>
    <?php echo $__env->make('partials.content-single-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endwhile; ?>

  <?php echo $__env->make('partials.modules', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <h6>Email</h6>
  <?php if( get_field('employee_email') ): ?>
    <?php echo e(get_field('employee_email')); ?>

  <?php endif; ?>

  <h6>Tlf.</h6>
  <?php if( get_field('employee_phone') ): ?>
    <?php echo e(get_field('employee_phone')); ?>

  <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>