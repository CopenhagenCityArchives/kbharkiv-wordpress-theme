<section class="module module-kildeviser <?php echo e(get_sub_field('modules_sdkkildeviser_spacing') ? '' : 'small-margin'); ?>">
  <?php
    wp_enqueue_style('KildeviserSearchSDK.min.css', 'https://static.kbharkiv.dk/kildeviser-sdk/KildeviserSearchSDK.min.css');
    wp_enqueue_script('KildeviserSearchSDK.min.js', 'https://static.kbharkiv.dk/kildeviser-sdk/KildeviserSearchSDK.min.js', [], null);
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
        <div id="module-kildeviser-<?php echo e(get_row_index()); ?>"></div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    jQuery(function() {
  	   KildeViserSearchSDK.init(<?php echo e(get_sub_field('modules_sdkkildeviser_id')); ?>, 'module-kildeviser-' + <?php echo e(get_row_index()); ?>);
  	});
  </script>

</section>
