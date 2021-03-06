<div class="nav-container group">
  <?php if (has_nav_menu('header')) : ?>
  <a class="nav-toggle" id="js-navigation-toggle" aria-hidden="true" href="#">Menu</a>
  <?php endif ?>
  <nav class="navigation" id="js-navigation">
    <?php
      if (has_nav_menu('header')) {
        $defaults = array(
          'theme_location' => 'header',
          'container_class' => 'menu-header',
          'depth' => 2,
          );
        $header = wp_nav_menu($defaults);
      }
    ?>
    <?php $header; ?>
  </nav>
</div>
