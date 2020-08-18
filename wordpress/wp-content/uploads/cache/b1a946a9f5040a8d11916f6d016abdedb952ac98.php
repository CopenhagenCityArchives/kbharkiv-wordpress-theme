<section class="module module-news" aria-label="Nyheder">
  <div class="container-fluid">

    <a class="h4 d-block mb-4" href="<?php echo e(get_post_type_archive_link( 'post' )); ?>"><?php echo e(get_sub_field('modules_news_headline') ? get_sub_field('modules_news_headline') : 'Nyheder'); ?> <?php echo $__env->make('partials.icon', ['icon' => 'arrow-right-circle'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></a>

    <div class="row">

      
      <?php if(get_sub_field('modules_news_news')): ?>
        <?php
          $posts = get_sub_field('modules_news_news');
          global $post;
        ?>

        <?php if( $posts ): ?>
        	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key > 0): ?>
              <?php break ?>
            <?php endif; ?>
            <?php setup_postdata($post) ?>
            <?php echo $__env->make('partials.content-news', ['class' => 'sticky col-md-6'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php wp_reset_postdata() ?>

          <div class="news col-md-6">
            <div class="row">
            	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key == 0): ?>
                  <?php continue ?>
                <?php endif; ?>
                <?php setup_postdata($post) ?>
                <?php echo $__env->make('partials.content-news', ['class' => 'offset-md-2 col-md-8'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php wp_reset_postdata() ?>
            </div>
          </div>
        <?php endif; ?>

      
      <?php else: ?>
        <?php
          // Show latest sticky post or else just latest post
          $posts = get_posts(array('posts_per_page' => 1, 'post__in' => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1));
          global $post;
        ?>

        <?php if( $posts ): ?>
          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              setup_postdata($post);
              $post_id = get_the_id();
            ?>
            <?php echo $__env->make('partials.content-news', ['class' => 'sticky col-md-6'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php wp_reset_postdata() ?>
        <?php endif; ?>

        <?php
          // Show 2 latest posts excluding the one above
          $posts = get_posts(array('posts_per_page' => 2, 'exclude' => array($post_id)));
        ?>

        <?php if( $posts ): ?>
          <div class="news col-md-6">
            <div class="row">
            	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php setup_postdata($post) ?>
                <?php echo $__env->make('partials.content-news', ['class' => 'offset-md-2 col-md-8'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php wp_reset_postdata() ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
