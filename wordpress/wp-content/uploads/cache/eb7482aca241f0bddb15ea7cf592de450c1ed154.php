<?php
  $args = [
    'post_type' => 'arrangementer',
    'posts_per_page' => 3,
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
    ]
  ];
  $posts = get_sub_field('modules_events_events') ? get_sub_field('modules_events_events') : get_posts($args);
  global $post;
?>

<?php if( $posts ): ?>
  <section class="module module-events" aria-label="Arrangementer">
    <div class="container-fluid">

      <a class="h4 d-block mb-4" href="<?php echo e(get_post_type_archive_link( 'arrangementer' )); ?>"><?php echo e(get_sub_field('modules_events_headline') ? get_sub_field('modules_events_headline') : 'Arrangementer'); ?> <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></a>
        <?php $prev_date = null ?>

      	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php setup_postdata($post) ?>
          <?php echo $__env->make('partials.content-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php $prev_date = strtotime(get_field('event_start')) ?>
      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php wp_reset_postdata() ?>
    </div>
  </section>
<?php endif; ?>
