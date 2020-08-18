<footer>
  <div class="container-fluid">
    <div class="row">
      <?php dynamic_sidebar('sidebar-footer') ?>

      <section class="ml-auto">
        <?php if(get_field('footer_address', 'option')): ?>
          <address>
            <h4><?php echo e(get_bloginfo()); ?></h4>
            <?php echo e(the_field('footer_address', 'option')); ?>

          </address>
        <?php endif; ?>

        <dl class="row small">
          <?php if( get_field('footer_email', 'option') ): ?>
            <dt class="col-3 col-lg-2">Email</dt>
            <dd class="col-9"><a class="text-break" aria-label="Email <?php echo get_bloginfo(); ?>" href="mailto:<?php echo e(get_field('footer_email', 'option')); ?>" target="_blank"><?php echo e(get_field('footer_email', 'option')); ?></a></dd>
          <?php endif; ?>
          <?php if( get_field('footer_phone', 'option') ): ?>
            <dt class="col-3 col-lg-2">Telefon</dt>
            <dd class="col-9"><a class="text-break" aria-label="Ring til <?php echo get_bloginfo(); ?>" href="tel:<?php echo e(get_field('footer_phone', 'option')); ?>" target="_blank"><?php echo e(get_field('footer_phone', 'option')); ?></a></dd>
          <?php endif; ?>
        </dl>

        <h4>Åbningstider</h4>
        <?php echo e(the_field('footer_hours', 'option')); ?>


        <img class="kk-logo" src="<?= App\asset_path('images/kk-logo.svg'); ?>" role="presentation" alt="København Kommune" />

      </section>
    </div>

  </div>
</footer>
