
<?php if( get_field('footer_background_colour', 'option')) : ?>
<footer class="footer" id="site-footer" role="contentinfo" style="background-color:<?php the_field('footer_background_colour', 'option'); ?>;">
<?php else : ?>
<footer class="footer" id="site-footer" role="contentinfo">
<?php endif ?>
    <div class="site-footer">
        <div class="row">

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
    </div>

    <div class="global-footer group" id="global-footer">
      <div class="footer-wrapper">

        <div class="footer-meta">
          <div class="footer-meta-inner">

            <div class="open-government-licence">
              <p class="logo"><a href="https://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/" rel="license">Open Government Licence</a></p>

                <p>All content is available under the <a href="https://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/" rel="license">Open Government Licence v3.0</a>, except where otherwise stated</p>

            </div>
          </div>

          <div class="copyright">
            <a href="http://www.nationalarchives.gov.uk/information-management/re-using-public-sector-information/copyright-and-re-use/crown-copyright/">&copy; Crown copyright</a>
          </div>
        </div>

      </div>
    </div>

</footer>
