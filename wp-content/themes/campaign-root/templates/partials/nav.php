<div class="nav-container group">
  <button class="nav-toggle" id="js-navigation-toggle">Menu</button>
  <nav class="navigation" id="js-navigation">
    <?php
      if (has_nav_menu('header')) {
        $defaults = array(
          'theme_location' => 'header',
          'depth' => 2,
          );
        $header = wp_nav_menu($defaults);
      }
    ?>
    <?php $header; ?>
  </nav>
</div>
