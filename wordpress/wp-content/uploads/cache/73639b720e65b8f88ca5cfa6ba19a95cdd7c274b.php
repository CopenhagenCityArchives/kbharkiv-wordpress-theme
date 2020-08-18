<?php if(is_user_logged_in()): ?>
  <li class="profile ml-auto parent" data-level="1" data-color="<?php echo e(color(get_field('color_theme', 'option'), 0)); ?>">
    <a class="d-flex align-items-center sub-menu-btn" href="#">Profil <?php echo $__env->make("partials.icon", ["icon" => "user"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></a>
    <ul class="sub-menu" data-level="1">
      <li class="nav-back d-lg-none"><a tabindex="-1" href="#">Tilbage</a></li>
      <li><a href="<?php echo e(get_field('my_page', 'option')['url']); ?>" tabindex="-1">Min side</a></li>
      <li><a href="<?php echo e(html_entity_decode(wp_logout_url('/'))); ?>" tabindex="-1">Log ud</a></li>
      <button class="nav-toggle desktop-menu-toggle"><span class="sr-only">Luk menu</span><div class="hamburger"></div></button>
    </ul>
  </li>
<?php else: ?>
  <li class="profile ml-auto">
    <a class="d-flex align-items-center" href="<?php echo e(get_field('login_page', 'option')['url']); ?>">Log ind <?php echo $__env->make("partials.icon", ["icon" => "lock"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></a>
  </li>
<?php endif; ?>
