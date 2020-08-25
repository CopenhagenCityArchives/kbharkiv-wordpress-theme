<header class="page-header darken-on-scroll" style="background-color: <?php echo e(theme_color()); ?>">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7">
        <?php $category = get_the_term_list( get_the_ID(), 'event_category', '', ', ', '' ) ?>
        <?php if($category): ?>
          <h4><?php echo $category; ?></h4>
        <?php endif; ?>

        <h1 id="headline"><?php echo App::title(); ?></h1>
      </div>
    </div>
  </div>
</header>

<?php echo e(the_breadcrumb()); ?>

