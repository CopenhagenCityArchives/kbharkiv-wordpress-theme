<?php $authors = get_field('author', get_the_ID()); ?>

<?php if( $authors ): ?>
  <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="author <?php echo e(isset($class) ? $class : ''); ?>">

      <?php if( has_post_thumbnail($author->ID)): ?>
        <?php echo wp_get_attachment_image(get_post_thumbnail_id($author->ID), ['48', '48'], false, ['class' => 'rounded-circle ']); ?>

      <?php endif; ?>

      <div class="d-flex flex-column">
        <h6><?php echo e(get_field('employee_title', $author->ID) ? get_field('employee_title', $author->ID) : 'Medarbejder'); ?></h6>
        <h4><?php echo e(get_the_title( $author->ID )); ?></h4>
      </div>
    </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
