<section class="module module-links <?php echo e(get_sub_field('modules_sdkkildeviser_spacing') ? '' : 'small-margin'); ?>">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
        <?php if( have_rows('modules_links_links') ): ?>
          <ul class="block-links">
          <?php while( have_rows('modules_links_links') ): ?>
            <?php the_row() ?>
            <li>
              <?php if( get_sub_field('modules_links_links_type') == 'link' ): ?>
                <?php $link = get_sub_field('modules_links_links_type_link') ?>
                <a href="<?php echo e($link['url']); ?>" target="<?php echo e($link['target'] ? $link['target'] : '_self'); ?>"><?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo e($link['title']); ?></a>
              <?php elseif( get_sub_field('modules_links_links_type') == 'download'): ?>
                <a href="<?php echo e(get_sub_field('modules_links_links_type_download')['url']); ?>" download><?php echo $__env->make('partials.icon', ['icon' => 'download'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo e(get_sub_field('modules_links_links_type_title')); ?></a>
              <?php endif; ?>
            </li>
          <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
