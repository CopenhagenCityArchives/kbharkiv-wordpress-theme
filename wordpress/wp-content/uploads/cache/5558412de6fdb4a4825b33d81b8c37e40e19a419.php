<?php
  $sdk_kildetaster = get_sub_field('modules_sdkkildetaster_test_sdk_url') ? get_sub_field('modules_sdkkildetaster_test_sdk_url') : 'https://kildetaster.kbharkiv.dk/sdk.js';
?>

<section class="module module-kildetaster" aria-label="Kildetaster">
  <?php
    wp_enqueue_style('sdk.css', 'https://kildetaster.kbharkiv.dk/sdk.css');
    wp_enqueue_script('sdk.js', $sdk_kildetaster, [], null);
  ?>
  <?php echo $sdk_kildetaster; ?>


  <div class="container-fluid">
    <div data-sdk-app>
      <h2><?php echo e(get_sub_field('modules_sdkkildetaster_headline_1')); ?></h2>
      <task-status task-id="<?php echo e(get_sub_field('modules_sdkkildetaster_id')); ?>"></task-status>
      <task-progress-plot task-id="<?php echo e(get_sub_field('modules_sdkkildetaster_id')); ?>" legend="true" year-pattern="_s(_d_d_d_d)"></task-progress-plot>
      <h2><?php echo e(get_sub_field('modules_sdkkildetaster_headline_2')); ?></h2>
      <taskunits-list task-id="<?php echo e(get_sub_field('modules_sdkkildetaster_id')); ?>"></taskunits-list>
    </div>
  </div>
</section>
