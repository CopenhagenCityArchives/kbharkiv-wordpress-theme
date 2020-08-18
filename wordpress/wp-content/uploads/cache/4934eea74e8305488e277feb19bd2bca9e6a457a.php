<?php $image_col = (has_post_thumbnail() && !get_field('page_hide_image')) ? 'offset-xl-3' : 'offset-xl-2' ?>

<section class="module module-content <?php echo e(get_sub_field('modules_sdkkildeviser_spacing') ? '' : 'small-margin'); ?>">
  <div class="container-fluid">
    <div class="row">
      <div class="<?php echo e(get_sub_field('modules_content_fullwidth') ? 'col' : ('col-lg-8 col-xl-6 offset-lg-1 ' . $image_col )); ?>">
        <div class="entry-content">
          <?php the_sub_field('modules_content_wysiwyg') ?>
        </div>
      </div>
    </div>
  </div>
</section>
