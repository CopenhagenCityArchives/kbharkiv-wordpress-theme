<?php if(!is_front_page()): ?>
  <header class="page-header darken-on-scroll" style="background-color: <?php echo e(theme_color()); ?>">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-xl-4">
          <h1><?php echo App::title(); ?></h1>
        </div>
        <div class="col-lg-6">
          <?php global $wp_query; ?>
          <?php if(is_search()): ?>
            <?php global $wp_query ?>
            <p class="lead"><?php echo e($wp_query->found_posts > 0 ? ('Viser ' . $wp_query->found_posts . ' søgeresultater') : ''); ?><p>
          <?php else: ?>
            <?php echo $__env->make('partials.lead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endif; ?>
        </div>
        <?php if(is_singular()): ?>
          <div class="col-xl-2">
            <?php echo $__env->make('partials.author', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <?php echo e(the_breadcrumb()); ?>

<?php endif; ?>
