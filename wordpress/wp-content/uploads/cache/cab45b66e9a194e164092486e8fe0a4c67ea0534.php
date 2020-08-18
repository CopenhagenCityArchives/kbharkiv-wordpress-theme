<?php if(have_rows('modules')): ?>
  <?php while( have_rows('modules') ): ?>
    <?php
      the_row();
    ?>

    <?php echo $__env->make('partials.modules.content-' . str_replace('_', '-', get_row_layout()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    
  <?php endwhile; ?>
<?php endif; ?>


