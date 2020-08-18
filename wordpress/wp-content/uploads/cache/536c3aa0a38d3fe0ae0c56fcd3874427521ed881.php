<article <?php post_class() ?>>

  <div class="container-fluid">
    <?php if(is_bbpress()): ?>
      <?php the_content() ?>
    <?php else: ?>
      <div class="row">
        <div class="col-lg-8 offset-lg-1 offset-xl-2">
          <header>
            <?php echo $__env->renderWhen(is_single() && get_post_type() == 'post', 'partials/entry-meta', array_except(get_defined_vars(), array('__data', '__path'))); ?>
            <h1 class="entry-title mb-4"><?php echo get_the_title(); ?></h1>
          </header>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-2">
          <?php echo $__env->make('partials.lead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-lg-3">
          <?php echo $__env->make('partials.author', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>

      <?php if( has_post_thumbnail()): ?>
        <figure class="row mb-5">
          <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <?php the_post_thumbnail( 'herox2' ); ?>
            <figcaption class="figure-caption">
              <?php echo e(get_post(get_post_thumbnail_id())->post_excerpt); ?>

            </figcaption>
          </div>
        </figure>
      <?php endif; ?>

      <div class="row">
        <div class="col-xl-2">
          <div class="d-none d-xl-block">
            <?php echo $__env->make('partials.tags', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        </div>
        <div class="col-lg-8 col-xl-6 offset-lg-1">
          <div class="entry-content">
            <?php the_content() ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

</article>
