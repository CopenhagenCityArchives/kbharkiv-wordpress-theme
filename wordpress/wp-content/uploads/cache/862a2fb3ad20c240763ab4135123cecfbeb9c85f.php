<?php
  wp_enqueue_style('sdk.css', 'https://kildetaster.kbharkiv.dk/sdk.css');
  wp_enqueue_script('sdk.js', 'https://kildetaster.kbharkiv.dk/sdk.js', [], null);
?>

<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php the_post() ?>

    <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.content-single-'.get_post_type(), ['no_header' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.modules', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.child-pages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container-fluid" id="<?php echo e(get_field('mypage_app')); ?>">
      <div class="card-columns">
        <?php if(have_rows('mypage_card')): ?>
          <?php while( have_rows('mypage_card') ): ?>
            <?php
              the_row();
            ?>
            <section class="card">
              <div class="card-header">
                <?php echo e(get_sub_field('mypage_card_headline')); ?>

              </div>
              <?php if( get_sub_field('mypage_card_image') ): ?>
                <?php echo wp_get_attachment_image( get_sub_field('mypage_card_image'), 'cardx2' ); ?>

              <?php endif; ?>
              <div class="card-body" <?php echo get_sub_field('mypage_card_angular_directive') ? ' data-sdk-app' : ''; ?>>
                <?php echo get_sub_field('mypage_card_content'); ?>

                <?php if( get_sub_field('mypage_card_angular_directive') ): ?>
                  <<?php echo get_sub_field('mypage_card_angular_directive'); ?>>
                  </<?php echo get_sub_field('mypage_card_angular_directive'); ?>>
                <?php endif; ?>
              </div>
            </section>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>

  <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>