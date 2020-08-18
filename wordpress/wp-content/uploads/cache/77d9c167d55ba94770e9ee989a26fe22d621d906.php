<?php
  global $post;
  $posts = get_posts(array(
    'post_type' => 'arrangementer',
    'meta_key' => 'event_start',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => [
      'relation' => 'AND',
      [
          'key' => 'event_start',
          'value' => date('Y-m-d H:i:s'),
          'compare' => '>=',
          'type' => 'DATE'
      ],
    ],
  ));

  $color = theme_color(1);

?>



<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php the_post() ?>

    <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container-fluid">
      <?php if(!$posts): ?>
        <div class="alert alert-warning">
          <?php echo e(__('Ingen indlæg.', 'kbharkiv')); ?>

        </div>
        <?php echo get_search_form(false); ?>

      <?php else: ?>
        <?php $prev_date = null ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php setup_postdata( $post ) ?>
          <?php echo $__env->make('partials.content-'.get_post_type(), ['prev_date' => $prev_date, 'color' => $color], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php $prev_date = strtotime(get_field('event_start')) ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php wp_reset_postdata() ?>
      <?php endif; ?>
    </div>

    <?php echo pagination(); ?>

  <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>