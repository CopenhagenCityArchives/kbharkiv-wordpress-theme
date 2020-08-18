<?php $event_start = strtotime(get_field('event_start')) ?>
<?php $event_end = strtotime(get_field('event_end')) ?>

<?php if(!is_tag() && date("ym", $event_start) != date("ym", $prev_date)): ?>
  <div class="month h1" role="presentation"><?php echo e(date_i18n("F Y", $event_start)); ?></div>
<?php endif; ?>

<article <?php post_class() ?> aria-label="<?php echo e(get_the_title()); ?>">
  <div class="row">

    <div class="col-lg-2" role="presentation">
      <time datetime="<?php echo e(date("Y-m-d H:i", $event_start)); ?>">
        <div class="h1" style="color: <?php echo e(isset($color) ? $color : theme_color(1)); ?>"><?php echo e(date("d", $event_start)); ?>.</div>
        <?php echo e(date("H:i", $event_start)); ?>

      </time>
      <?php if( $event_end ): ?>
        <time datetime="<?php echo e(date("Y-m-d H:i", $event_end)); ?>">
          – <?php echo e(date("H:i", $event_end)); ?>

        </time>
      <?php endif; ?>
    </div>
    <div class="col-lg-3">
      <a href="<?php echo e(get_permalink()); ?>">
        <?php the_post_thumbnail('medium'); ?>
      </a>
    </div>
    <div class="col-lg-5">
      <?php $category = get_the_term_list( get_the_ID(), 'event_category', '', ', ', '' ) ?>
      <?php if($category): ?>
        <h6><?php echo $category; ?></h6>
      <?php endif; ?>
      <a href="<?php echo e(get_permalink()); ?>">
        <header>
          <h2 class="entry-title"><?php echo e(the_title()); ?></h2>
        </header>
        <div class="entry-summary">
          <?php echo e(get_the_lead(get_the_ID())); ?>

        </div>
      </a>
    </div>

    <div class="col-lg-2">
      <h6>Pris</h6>
      <div class="h4 mb-4">
        <?php if( get_field('event_price') ): ?>
          <?php echo e(get_field('event_price')); ?> kr.
        <?php else: ?>
          Gratis
        <?php endif; ?>
      </div>

      <?php if( get_field('event_link') ): ?>
        <a class="btn btn-primary" target="_blank" href="<?php echo e(get_field('event_link')); ?>" role="button"><?php echo e(get_field('event_price') && get_field('event_price') > 0 ? 'Køb billet' : 'Tilmeld'); ?></a>
      <?php endif; ?>

    </div>
  </div>

</article>
