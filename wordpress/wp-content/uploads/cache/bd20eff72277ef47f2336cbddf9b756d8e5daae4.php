<?php
  wp_enqueue_style('sdk.css', 'https://kildetaster.kbharkiv.dk/sdk.css');
  wp_enqueue_script('sdk.js', 'https://kildetaster.kbharkiv.dk/sdk.js', [], null);
?>

<?php $__env->startSection('content'); ?>
  <!-- SDK START -->
  <div id="search-app-simple-search-text" ng-cloak>
    <?php if(get_field('sdksearch_simple-search-text')): ?>
      <?php echo get_field('sdksearch_simple-search-text'); ?>

    <?php endif; ?>
    
  </div>
  <div id="search-app-upper-text" ng-cloak>
    <?php if(get_field('sdksearch_upper-text')): ?>
      <?php echo get_field('sdksearch_upper-text'); ?>

    <?php endif; ?>
    
  </div>
  <div id="search-app-lower-text" ng-cloak>
    <?php if(get_field('sdksearch_lower-text')): ?>
      <?php echo get_field('sdksearch_lower-text'); ?>

    <?php endif; ?>
    
  </div>
  <div id="search-app-advanced-search-lower" ng-cloak>
    <?php if(get_field('sdksearch_advanced-search-lower')): ?>
      <?php echo get_field('sdksearch_advanced-search-lower'); ?>

    <?php endif; ?>
    
  </div>
  <div id="search-app-error" ng-cloak>
    <?php if(get_field('sdksearch_error')): ?>
      <?php echo get_field('sdksearch_error'); ?>

    <?php endif; ?>
    
  </div>
  <div id="search-app-no-results" ng-cloak>
    <?php if(get_field('sdksearch_no-results')): ?>
      <?php echo get_field('sdksearch_no-results'); ?>

    <?php endif; ?>

    
  </div>

  <div id="search-app-help-text" ng-cloak>
    <?php if(get_field('sdksearch_help-text')): ?>
      <?php echo get_field('sdksearch_help-text'); ?>

    <?php endif; ?>
  </div>

  <div class="sdk-search" data-sdk-app>
    <div ui-view="">&nbsp;</div>
  </div>
  <!-- SDK END -->

  <?php echo pagination(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>