<?php if(get_post_type() === 'post'): ?>
  <h6><?php echo e(is_tag() || is_search() ? 'Nyhed – ' : ''); ?><time class="updated" datetime="<?php echo e(get_post_time('c', true)); ?>"><?php echo e(get_the_date()); ?></time></h6>
<?php elseif(get_post_type() === 'page'): ?>
  <h6>Side</h6>
<?php elseif(get_post_type() === 'arrangementer'): ?>
  
  <?php $event_start = strtotime(get_field('event_start')) ?>

  <?php if(get_field('event_start') > date('Y-m-d H:i:s')): ?>
    <h6>Arrangement – <time datetime="<?php echo e(date("Y-m- H:i", $event_start)); ?>"><?php echo e(date_i18n("j. F Y H:i", $event_start)); ?></time></h6>
  <?php else: ?>
    <h6>Arrangement - Slut</h6>
  <?php endif; ?>
<?php endif; ?>
