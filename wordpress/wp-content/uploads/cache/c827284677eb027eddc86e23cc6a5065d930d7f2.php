<?php
  global $post;
  $posts = get_posts(array(
    'post_type' => 'medarbejdere',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
  ));
?>



<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="container-fluid">

    <?php if(!have_posts()): ?>
      <div class="alert alert-warning">
        <?php echo e(__('Vi har ikke lagt vores medarbejdere online. Beklager ulejligheden', 'kbharkiv')); ?>

      </div>
      <?php echo get_search_form(false); ?>

    <?php else: ?>
      <?php
        $terms = get_terms([
          'taxonomy' => 'employee_category',
          'hide_empty' => true,
        ]);
      ?>

      <nav class="category-filter">
        <a href="<?php echo e(get_post_type_archive_link('medarbejdere')); ?>" class="<?php echo e(is_page_template(get_page_template_slug()) && !is_tax() ? 'active' : ''); ?>"><?php echo e(__('Alle medarbejdere', 'kbharkiv')); ?></a>
        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(get_term_link($term->term_id)); ?>" class="<?php echo e(is_tax('employee_category', $term->slug) ? 'active' : ''); ?>"><?php echo e($term->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </nav>

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