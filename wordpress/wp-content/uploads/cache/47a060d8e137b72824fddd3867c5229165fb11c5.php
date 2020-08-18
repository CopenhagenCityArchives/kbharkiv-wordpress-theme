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

      <nav class="category-filter" aria-label="Filtrer medarbejdere efter afdeling">
        <a href="<?php echo e(get_post_type_archive_link('medarbejdere')); ?>" class="<?php echo e(is_archive('medarbejdere') && !is_tax() ? 'active' : ''); ?>"><?php echo e(__('Alle medarbejdere', 'kbharkiv')); ?><?php echo is_archive('medarbejdere') && !is_tax() ? ' <span class="sr-only">(valgt)</span>' : ''; ?></a>
        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(get_term_link($term->term_id)); ?>" class="<?php echo e(is_tax('employee_category', $term->slug) ? 'active' : ''); ?>"><?php echo e($term->name); ?><?php echo is_tax('employee_category', $term->slug) ? ' <span class="sr-only">(valgt)</span>' : ''; ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </nav>

      <div class="row">
        <?php while(have_posts()): ?> <?php the_post() ?>
          <?php echo $__env->make('partials.content-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php echo pagination(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>