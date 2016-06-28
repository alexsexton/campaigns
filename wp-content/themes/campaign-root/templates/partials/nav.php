<button class="nav-toggle" id="js-navigation-toggle">Menu</button>
<div class="nav-container group">
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
