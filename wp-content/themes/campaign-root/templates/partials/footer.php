
<?php if( get_field('footer_background_colour', 'option')) : ?>
<footer class="site-footer" id="site-footer" role="contentinfo" style="background-color:<?php the_field('footer_background_colour', 'option'); ?>;">
<?php else : ?>
<footer class="site-footer" id="site-footer" role="contentinfo">
<?php endif ?>
    <div class="row">
        <?php dynamic_sidebar('sidebar-footer'); ?>

        <nav class="footer-navigation">
        <?php
            if (has_nav_menu('footer')) {
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'menu-footer',
                    'depth' => '1',
                ));
            }
        ?>
        </nav>

        <?php get_template_part('partials/follow'); ?>

    </div>

</footer>
