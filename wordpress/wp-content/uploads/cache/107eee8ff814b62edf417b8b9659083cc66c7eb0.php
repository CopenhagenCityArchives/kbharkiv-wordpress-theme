<?php
  global $post;
  $posts = get_posts(array(
    'post_type' => 'arrangementer',
  ));
?>



<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="container-fluid">

    <?php if(!$posts): ?>
      <div class="alert alert-warning">
        <?php echo e(__('Ingen indlæg.', 'kbharkiv')); ?>

      </div>
      <?php echo get_search_form(false); ?>

    <?php else: ?>
      <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php setup_postdata( $post ) ?>
          <?php echo $__env->make('partials.content-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php wp_reset_postdata() ?>
      </div>
    <?php endif; ?>
  </div>

  <?php echo pagination(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>