<section class="content">
  <div class="container-fluid">
    <?php if(!isset($no_header) && !get_field('page_headline_in_header') && !is_front_page()): ?>
      <div class="row">
        <div class="col-lg-8 offset-lg-1 offset-xl-2">
          <header>
            <h1 class="entry-title mb-4"><?php echo get_the_title(); ?></h1>
          </header>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-2">
          <?php echo $__env->make('partials.lead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-lg-3">
          <?php echo $__env->make('partials.author', ['class' => 'mb-4'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if( has_post_thumbnail() && !get_field('page_hide_image')): ?>
      <figure class="row mb-5">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
          <?php the_post_thumbnail( 'herox2' ); ?>
          <figcaption class="figure-caption">
            <?php echo e(get_post(get_post_thumbnail_id())->post_excerpt); ?>

          </figcaption>
        </div>
      </figure>
    <?php endif; ?>

    <?php if( !empty( get_the_content() )): ?>
      <?php $image_col = (has_post_thumbnail() && !get_field('page_hide_image')) ? 'offset-xl-3' : 'offset-xl-2' ?>

      <div class="row">
        <div class="col-lg-8 col-xl-6 offset-lg-1 <?php echo e($image_col); ?>">
          <div class="entry-content">
            <?php the_content() ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
