<?php
  $field = get_sub_field('search_internal_group');
?>

<li role="search" aria-label="Søg på siden">
  <form method="get" class="search-form" action="<?php echo e(esc_url( home_url( '/' ) )); ?>">
    <div class="form-group">
      <?php if($field['search_internal_group_headline']): ?>
        <label class="h4" for="search-internal"><?php echo e($field['search_internal_group_headline']); ?></label>
      <?php endif; ?>
      <?php if($field['search_internal_group_copy']): ?>
        <p class="small"><?php echo e($field['search_internal_group_copy']); ?></p>
      <?php endif; ?>
      <input type="search" class="form-control search-focusable" id="search-internal" placeholder="Søg" value="<?php echo e(get_search_query()); ?>" name="s" tabindex="-1" />
    </div>
    <button type="submit" class="btn btn-primary search-focusable" tabindex="-1">Søg</button>
    <?php if($field['search_internal_group_link']): ?>
      <div class="d-block mt-4">
        <a class="search-focusable" tabindex="-1" href="<?php echo e($field['search_internal_group_link']['url']); ?>" target="<?php echo e($field['search_internal_group_link']['target'] ? $field['search_internal_group_link']['target'] : '_self'); ?>"><?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo e($field['search_person_group_link']['title']); ?></a>
      </div>
    <?php endif; ?>
  </form>
</li>
