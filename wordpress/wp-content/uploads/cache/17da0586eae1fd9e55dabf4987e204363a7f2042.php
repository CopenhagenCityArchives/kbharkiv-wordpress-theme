  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
        <?php echo $__env->make('partials.tags', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php if(!is_page()): ?>
          <?php
            $prev = empty(get_adjacent_post(false,'',true)) ? false : get_adjacent_post(false,'',true)->ID;
            $next = empty(get_adjacent_post(false,'',false)) ? false : get_adjacent_post(false,'',false)->ID;
          ?>

          <?php if($prev): ?>
            <h6>Forrige</h6>
            <a class="h5" href="<?php echo e(get_permalink( $prev )); ?>">
              <?php echo e(get_the_title( $prev )); ?>

            </a>
          <?php endif; ?>

          <?php if($next): ?>
            <h6>Næste</h6>
            <a class="h5" href="<?php echo e(get_permalink( $next )); ?>">
              <?php echo e(get_the_title( $next )); ?>

            </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
