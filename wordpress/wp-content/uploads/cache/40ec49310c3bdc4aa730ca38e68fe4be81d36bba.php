<?php
  $field = get_sub_field('search_person_group');
?>

<li role="search" aria-label="Søg person">
  <form id="apacs_freetext_search__form">
    <div class="form-group">
      <?php if($field['search_person_group_copy']): ?>
        <label class="h4" for="person_search_term"><?php echo e($field['search_person_group_headline']); ?></label>
      <?php endif; ?>
      
      <?php if($field['search_person_group_copy']): ?>
        <p class="small"><?php echo e($field['search_person_group_copy']); ?></p>
      <?php endif; ?>
      <input class="form-control search-focusable" tabindex="-1" id="person_search_term" title="Navn, adresse eller fritekst" type="text" placeholder="Navn, adresse eller fritekst">
    </div>
    <button class="btn btn-primary search-focusable" tabindex="-1">Søg</button>
  </form>
  <?php if($field['search_person_group_link']): ?>
    <div class="d-block mt-4">
      <a class="search-focusable" tabindex="-1" href="<?php echo e($field['search_person_group_link']['url']); ?>" target="<?php echo e($field['search_person_group_link']['target'] ? $field['search_person_group_link']['target'] : '_self'); ?>"><?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo e($field['search_person_group_link']['title']); ?></a>
    </div>
  <?php endif; ?>

</li>
