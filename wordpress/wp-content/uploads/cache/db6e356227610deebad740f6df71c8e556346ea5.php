<?php if( !empty( get_the_content() ) || has_post_thumbnail() ): ?>

      <?php if( has_post_thumbnail()): ?>
            <?php the_post_thumbnail( 'herox2' ); ?>
            <figcaption class="figure-caption">
              <?php echo e(get_post(get_post_thumbnail_id())->post_excerpt); ?>

            </figcaption>
          </div>
        </figure>
      <?php endif; ?>
      page
      <?php if( !empty( get_the_content() )): ?>
        <div class="row">
          <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
            <?php the_content() ?>
            <?php echo wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
