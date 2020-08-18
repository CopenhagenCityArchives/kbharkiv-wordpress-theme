<?php $event_start = strtotime(get_field('event_start')) ?>
<?php $event_end = strtotime(get_field('event_end')) ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-7">

      <?php if(has_post_thumbnail()): ?>
        <figure>
          <?php the_post_thumbnail( 'herox2' ); ?>
          <figcaption class="figure-caption">
            <?php echo e(get_post(get_post_thumbnail_id())->post_excerpt); ?>

          </figcaption>
        </figure>
      <?php endif; ?>

      <?php echo $__env->make('partials.lead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="entry-content">
        <?php the_content() ?>
      </div>

      <?php echo $__env->make('partials.modules', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="mt-5">
        <?php echo $__env->make('partials.tags', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('partials.nav-post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>

    </div>
    <div class="offset-lg-1 col-lg-4">
      <div class="event-info" style="background-color: <?php echo e(theme_color(1)); ?>">
        <time class="event-start" datetime="<?php echo e(date("Y-m-d H:i", $event_start)); ?>">
          <div class="date font-weight-bold"><?php echo e(date("d", $event_start)); ?></div>
          <div class="month font-weight-bolder"><?php echo e(date_i18n("F", $event_start)); ?></div>

          <div class="h6">Tid</div>
          <span class="h4">
            <?php echo e(date("H:i", $event_start)); ?>

          </span>
        </time>
        
        <?php if($event_end && date("Ymd", $event_start) == date("Ymd", $event_end)): ?>
          <time datetime="<?php echo e(date("Y-m-d H:i", $event_end)); ?>">
            <span class="h4">
              – <?php echo e(date("H:i", $event_end)); ?>

            </span>
          </time>
        
        <?php elseif($event_end && date("Ymd", $event_start) < date("Ymd", $event_end)): ?>
          <time datetime="<?php echo e(date("Y-m-d H:i", $event_end)); ?>">
            <span class="h4">
              – <?php echo e(date("d/m H:i", $event_end)); ?>

            </span>
          </time>
        
        <?php endif; ?>

        <?php if( get_field('event_location') ): ?>
          <div class="h6">Lokation</div>
          <div class="h4"><?php echo e(get_field('event_location')); ?></div>
        <?php endif; ?>

        <div class="h6">Pris</div>
        <div class="h4"><?php echo e(get_field('event_price') ? get_field('event_price') . ' kr.': 'Gratis'); ?></div>

        <?php if( get_field('event_link') ): ?>
          <a class="btn btn-primary btn-lg" href="<?php echo e(get_field('event_link')); ?>" role="button" target="_blank"><?php echo e(get_field('event_price') || get_field('event_price') > 1 ? 'Køb billet' : 'Tilmeld'); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
