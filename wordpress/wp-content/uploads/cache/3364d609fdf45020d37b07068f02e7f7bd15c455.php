<?php if( get_field('childpages') == true ): ?>
  <?php
    $args = [
      'child_of' => $post->ID,
      'depth' => 2,
      'title_li' => '',
      'walker' => new Kbharkiv_Walker_Nav_Children
    ];
    $child_pages = get_pages( $args )
  ?>

  <?php if(!empty($child_pages)): ?>
    <section class="module module-child-pages">
      <div class="container-fluid">
        <span class="sr-only">Undersider</span>
        <div class="row">
          <?php echo e(wp_list_pages($args)); ?>


          <?php if( have_rows('childpages_append') ): ?>
            <?php while( have_rows('childpages_append') ): ?>
              <?php
                the_row();
                $image = get_sub_field('childpages_append_image');
                $link = get_sub_field('childpages_append_link');
                $text = get_sub_field('childpages_append_text');
              ?>

              <div class="page-item col-sm-6 col-md-5 col-lg-4 col-xl-3 mb-5">
                <a class="article-link" href="<?php echo e($link['url']); ?>" target="<?php echo e($link['target'] ? $link['target'] : '_self'); ?>">
                  <?php if($image): ?>
                    <?php echo wp_get_attachment_image($image, 'herox1', false, ['class' => 'mb-4']); ?>

                  <?php endif; ?>
                  <h3 class="mb-2">
                    <span class="mr-2"><?php echo e($link['title']); ?></span>
                    <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  </h3>
                  <div><?php echo e($text ? $text : ''); ?></div>
                </a>
              </div>
              <div class="d-none d-md-block col-md-1 d-lg-none col-xl-1 d-xl-block"></div>
            <?php endwhile; ?>

          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>
