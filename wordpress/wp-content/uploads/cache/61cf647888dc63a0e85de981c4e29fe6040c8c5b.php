<div class="col-sm-6 col-md-4 col-lg-6">
  <article <?php post_class() ?> aria-label="<?php echo e(get_the_title()); ?>">
    <div class="row">
      <div class="col-4 col-sm-12 col-lg-4">
        <?php if( has_post_thumbnail()): ?>
          <?php the_post_thumbnail( 'profilex2', ['class' => 'profile-image'] ); ?>
        <?php else: ?>
          Billede kommer snart
        <?php endif; ?>
      </div>
      <div class="col-8 col-sm-12 col-lg-8">
        <?php if(get_field('employee_title')): ?>
          <h6><?php echo e(get_field('employee_title')); ?></h6>
        <?php endif; ?>
        <header>
          <h3 class="entry-title"><?php echo get_the_title(); ?></h3>
        </header>
        <div class="entry-summary small">
          <?php the_excerpt() ?>
        </div>

        <dl class="row small">
          <?php if( get_field('employee_email') ): ?>
            <dt class="col-3 col-lg-2">Email</dt>
            <dd class="col-9"><a class="text-break" aria-label="Email <?php echo get_the_title(); ?>" href="mailto:<?php echo e(get_field('employee_email')); ?>" target="_blank"><?php echo e(get_field('employee_email')); ?></a></dd>
          <?php endif; ?>
          <?php if( get_field('employee_phone') ): ?>
            <dt class="col-3 col-lg-2">Mobil</dt>
            <dd class="col-9"><a class="text-break" aria-label="Ring til <?php echo get_the_title(); ?>" href="tel:<?php echo e(get_field('employee_phone')); ?>" target="_blank"><?php echo e(get_field('employee_phone')); ?></a></dd>
          <?php endif; ?>
        </dl>
      </div>
    </div>
  </article>
</div>
