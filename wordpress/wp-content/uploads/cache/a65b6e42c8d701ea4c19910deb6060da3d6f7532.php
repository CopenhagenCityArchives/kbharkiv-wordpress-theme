

<a href="<?php echo e(get_permalink()); ?>" class="article-link col-md-3 d-flex align-self-stretch">
  <article <?php post_class('content-search') ?>>

    <?php if( has_post_thumbnail()): ?>
      <?php the_post_thumbnail( 'herox2' ) ?>
    <?php endif; ?>

    <header>
      <?php echo $__env->make('partials/entry-meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <h3 class="entry-title"><?php echo get_the_title(); ?></h3>
    </header>
    <div class="entry-summary">
      <?php echo e(get_the_lead(get_the_id())); ?>

    </div>

  </article>
</a>

<div class="col-md-1"></div>
