<?php
  $prev = empty(get_adjacent_post(false,'',true)) ? false : get_adjacent_post(false,'',true)->ID;
  $next = empty(get_adjacent_post(false,'',false)) ? false : get_adjacent_post(false,'',false)->ID;
?>

<?php if($prev || $next): ?>
  <section class="module module-postnav">
    <?php if(isset($container)): ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
            <div class="row">
              <?php if($prev): ?>
                <div class="col-md-6 mb-4">
                  <h6>Forrige</h6>
                  <a class="article-link" href="<?php echo e(get_permalink( $prev )); ?>">
                    <h4><span class="mr-2"><?php echo get_the_title( $prev ); ?></span> <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></h4>
                  </a>
                </div>
              <?php endif; ?>
              <?php if($next): ?>
                <div class="col-md-6 mb-4">
                  <h6>Næste</h6>
                  <a class="article-link" href="<?php echo e(get_permalink( $next )); ?>">
                    <h4><span class="mr-2"><?php echo get_the_title( $next ); ?></span> <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></h4>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="row">
        <?php if($prev): ?>
          <div class="col-md-6 mb-4">
            <h6>Forrige</h6>
            <a class="article-link" href="<?php echo e(get_permalink( $prev )); ?>">
              <h4><span class="mr-2"><?php echo get_the_title( $prev ); ?></span> <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></h4>
            </a>
          </div>
        <?php endif; ?>
        <?php if($next): ?>
          <div class="col-md-6 mb-4">
            <h6>Næste</h6>
            <a class="article-link" href="<?php echo e(get_permalink( $next )); ?>">
              <h4><span class="mr-2"><?php echo get_the_title( $next ); ?></span> <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></h4>
            </a>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </section>
<?php endif; ?>
