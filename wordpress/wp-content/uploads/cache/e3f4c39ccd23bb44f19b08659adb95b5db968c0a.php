<?php
  $images = get_sub_field('modules_shortcuts_gallery');
?>

<?php if( have_rows('modules_shortcuts_repeater')): ?>
  <section class="module module-shortcuts" aria-label="Genveje">
    <div class="container-fluid">
      <div class="row">

        <?php echo $images ? '<div class="col-lg-8"><div class="row shortcut-row">' : ''; ?>

          <?php while( have_rows('modules_shortcuts_repeater') ): ?>
            <?php
              the_row();
              $link = get_sub_field('modules_shortcuts_repeater_url');
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

            <a href="<?php echo e(esc_url( $link_url )); ?>" target="<?php echo e(esc_attr( $link_target )); ?>" class="article-link <?php echo e($images ? 'col-sm-6 d-flex' : 'col-sm-6 col-lg-4 d-flex'); ?>">
              <?php if( get_sub_field('modules_shortcuts_repeater_icon') ): ?>
                <?php echo wp_get_attachment_image( get_sub_field('modules_shortcuts_repeater_icon'), 'shortcutx4', true, ['role' => 'presentation', 'class' => 'shortcut-icon'] ); ?>

              <?php endif; ?>
              <div class="text">
                <h4><?php echo e(esc_html( $link_title )); ?></h4>
                <?php echo e(get_sub_field('modules_shortcuts_repeater_copy')); ?>

              </div>
            </a>
          <?php endwhile; ?>
        <?php echo $images ? '</div></div>' : ''; ?>


        <?php if($images): ?>
          <?php
            $image = $images[rand(0, count($images)-1)];
            $random_color = theme_color(0, 1);
          ?>
          <div class="col-lg-4">
            <figure role="presentation" style="background-image: url(<?php echo e($image['sizes']['large']); ?>)">
              <div class="owl parallax" data-parallax="100" style="background-color: <?php echo e($random_color[1]); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="4rem" viewBox="0 0 113.5 166" style="fill: <?php echo e($random_color[0]); ?>"><path d="M85.9,32.5A13.6,13.6,0,1,0,99.5,46.1,13.6,13.6,0,0,0,85.9,32.5Zm0,25.2A11.6,11.6,0,1,1,97.5,46.1,11.6,11.6,0,0,1,85.9,57.7Z"/><circle cx="85.9" cy="46.1" r="6.8"/><path d="M29.2,59.7A13.6,13.6,0,1,0,15.6,46.1,13.6,13.6,0,0,0,29.2,59.7Zm0-25.2A11.6,11.6,0,1,1,17.6,46.1,11.6,11.6,0,0,1,29.2,34.5Z"/><circle cx="29.2" cy="46.1" r="6.8"/><path d="M113.3,46.8c0-.2,0-.5,0-.7a28.9,28.9,0,0,0-2.2-11,56.6,56.6,0,0,0-2.8-7.4l.3-21.1A4.5,4.5,0,0,0,103.2,2L83,6.4a56.9,56.9,0,0,0-52.3-.1L11.2,2A4.5,4.5,0,0,0,5.8,6.4V26.4a56.5,56.5,0,0,0-3.4,8.8A28.9,28.9,0,0,0,.2,46.1c0,.2,0,.5,0,.7S0,49.7,0,51.2A56.2,56.2,0,0,0,4.9,74.1V78a87.8,87.8,0,0,0,27.4,63.7l-5.3,20.1H66A87.7,87.7,0,0,0,92.9,166h15.6V74.4a56.2,56.2,0,0,0,5-22.9C113.5,49.9,113.4,48.4,113.3,46.8ZM8.8,6.4a1.5,1.5,0,0,1,1.4-1.4h.3L31.1,9.5l.5-.3a53.9,53.9,0,0,1,50.5.1l.5.3L103.9,5a1.5,1.5,0,0,1,1.8,1.4l-.2,19.7A29,29,0,0,0,56.8,36.9,29,29,0,0,0,8.7,25.5ZM67.5,69.7,57,80.3,46.3,69.6A29.2,29.2,0,0,0,56.8,55.3,29.2,29.2,0,0,0,67.5,69.7ZM5.1,36.2A26,26,0,1,1,3.2,46.9,53.2,53.2,0,0,1,5.1,36.2Zm27,121.6,3.5-13.1a88.3,88.3,0,0,0,20.2,13.1ZM92.9,163a85.1,85.1,0,0,1-85-83,56.9,56.9,0,0,0,48.3,28H58v8.6A48,48,0,0,0,94.1,163Zm12.6-.5A46,46,0,0,1,60,116.5v-8.7A56.4,56.4,0,0,0,96.5,91.6a57.5,57.5,0,0,0,9-11.4ZM94.4,89.4A53.4,53.4,0,0,1,56.8,105h-.5A54,54,0,0,1,3.7,60a29,29,0,0,0,40,11.2L57,84.5,70.1,71.4A29,29,0,0,0,109.8,60,53.4,53.4,0,0,1,94.4,89.4ZM84.3,72.1a26,26,0,1,1,24-36.1,53.1,53.1,0,0,1,2,10.9A26.1,26.1,0,0,1,84.3,72.1Z"/></svg>
              </div>
            </figure>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php else: ?>
  Ingen rækker fundet
<?php endif; ?>
