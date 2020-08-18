<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php the_post() ?>

    <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container-fluid" id="<?php echo e(get_field('mypage_app')); ?>">
      <script id="CookieDeclaration" src="https://consent.cookiebot.com/45617c96-571e-4b06-9521-9a417f327c48/cd.js" async="" type="text/javascript"></script>
    </div>
  <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>