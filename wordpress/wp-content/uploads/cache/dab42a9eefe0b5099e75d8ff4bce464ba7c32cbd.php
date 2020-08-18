<!-- SDK START -->
<div id="search-app-simple-search-text" ng-cloak>
  <?php if(get_sub_field('modules_sdksearch_simple-search-text')): ?>
    <?php echo get_sub_field('modules_sdksearch_simple-search-text') ?>
  <?php endif; ?>
  
</div>
<div id="search-app-upper-text" ng-cloak>
  <?php if(get_sub_field('modules_sdksearch_upper-text')): ?>
    <?php echo get_sub_field('modules_sdksearch_upper-text') ?>
  <?php endif; ?>
  
</div>
<div id="search-app-lower-text" ng-cloak>
  <?php if(get_sub_field('modules_sdksearch_lower-text')): ?>
    <?php echo get_sub_field('modules_sdksearch_lower-text') ?>
  <?php endif; ?>
  
</div>
<div id="search-app-advanced-search-lower" ng-cloak>
  <?php if(get_sub_field('modules_sdksearch_advanced-search-lower')): ?>
    <?php echo get_sub_field('modules_sdksearch_advanced-search-lower') ?>
  <?php endif; ?>
  
</div>
<div id="search-app-error" ng-cloak>
  <?php if(get_sub_field('modules_sdksearch_error')): ?>
    <?php echo get_sub_field('modules_sdksearch_error') ?>
  <?php endif; ?>
  
</div>
<div id="search-app-no-results" ng-cloak>
  <?php if(get_sub_field('modules_sdksearch_no-results')): ?>
    <?php echo get_sub_field('modules_sdksearch_no-results') ?>
  <?php endif; ?>

  
</div>

<div class="sdk-search" data-sdk-app>
  <div ui-view="">&nbsp;</div>
</div>

<script src="https://www.kbhkilder.dk/software/kildetaster-new-site/resources/js/sdk.js" type="text/javascript"></script>

<!-- SDK END -->
