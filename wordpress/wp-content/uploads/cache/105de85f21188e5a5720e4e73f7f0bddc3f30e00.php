<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php the_post() ?>
    <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container-fluid">
      <?php if(get_field('forum_copy')): ?>
        hejs
        <?php echo e(the_field('forum_copy')); ?>

      <?php endif; ?>
      <?php echo do_shortcode("[bbp-forum-index]"); ?>

    </div>
  <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>