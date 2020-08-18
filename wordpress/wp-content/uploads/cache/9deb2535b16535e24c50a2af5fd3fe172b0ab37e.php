<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php the_post() ?>
    <?php if((get_field('page_headline_in_header') && !is_front_page()) || is_bbpress()): ?>
      <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php elseif(!is_front_page()): ?>
      <?php echo e(the_breadcrumb()); ?>

    <?php else: ?>
      
      <div class="sr-only" role="heading" aria-level="1">
        Forside
      </div>
    <?php endif; ?>

    <?php if(is_bbpress() && get_field('forum_copy')): ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <?php echo e(the_field('forum_copy')); ?>

          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php echo $__env->make('partials.content-single-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.modules', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.tags', ['container' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.child-pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>