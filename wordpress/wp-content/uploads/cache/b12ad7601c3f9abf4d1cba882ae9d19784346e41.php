<?php
  $field = get_sub_field('search_archive_group');
?>

<li role="search" aria-label="Søg og bestil til læsesalen">
  <form id="searchform_catalog" action="http://www.kbharkiv.dk/kbharkiv/php/starbas_search.php" method="get">
    <div class="search-form form-group">
      <?php if($field['search_archive_group_headline']): ?>
        <label class="h4" for="catalog_query"><?php echo e($field['search_archive_group_headline']); ?></label>
      <?php endif; ?>
      <?php if($field['search_archive_group_copy']): ?>
        <p class="small"><?php echo e($field['search_archive_group_copy']); ?></p>
      <?php endif; ?>
      <input class="form-control search-focusable" tabindex="-1" id="catalog_query" placeholder="Søg arkivmateriale i Starbas" name="catalog_query" type="search" />
    </div>
    <button id="searchform_catalog_button" class="btn btn-primary search-focusable" tabindex="-1">Søg</button>
    <?php if($field['search_archive_group_link']): ?>
      <div class="d-block mt-4">
        <a class="search-focusable" tabindex="-1" href="<?php echo e($field['search_archive_group_link']['url']); ?>" target="<?php echo e($field['search_archive_group_link']['target'] ? $field['search_archive_group_link']['target'] : '_self'); ?>"><?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo e($field['search_archive_group_link']['title']); ?></a>
      </div>
    <?php endif; ?>
  </form>
</li>
