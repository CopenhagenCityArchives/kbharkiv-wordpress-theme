<?php $images = get_sub_field('modules_before_and_after_images') ?>

<?php if( $images ): ?>
  <section class="module module-before-and-after <?php echo e(get_sub_field('modules_before_and_after_spacing') ? '' : 'small-margin'); ?>" aria-label="Før og efter billede">
    <div class="container-fluid">
      <div class="row">
        <figure class="col-lg-8 offset-lg-2">
          <div class="beer-slider" data-beer-label="<?php echo e(get_sub_field('modules_before_and_after_after') ? get_sub_field('modules_before_and_after_after') : 'Efter'); ?>">
            <?php echo wp_get_attachment_image( $images[0]['ID'], 'herox2' ); ?>

            <div class="beer-reveal" data-beer-label="<?php echo e(get_sub_field('modules_before_and_after_before') ? get_sub_field('modules_before_and_after_before') : 'Før'); ?>">
              <?php echo wp_get_attachment_image( $images[1]['ID'], 'herox2' ); ?>

            </div>
          </div>
          <?php if(get_sub_field('modules_before_and_after_text')): ?>
            <figcaption class="figure-caption">
              <?php echo e(get_sub_field('modules_before_and_after_text')); ?>

            </figcaption>
          <?php endif; ?>
        </figure>
      </div>
    </div>
  </section>
<?php endif; ?>
