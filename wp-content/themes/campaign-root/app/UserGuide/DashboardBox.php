<?php

namespace Dxw\GdsCampaignRoot\UserGuide;

class DashboardBox implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('wp_dashboard_setup', [$this, 'wpDashboardSetup']);
        add_action('default_hidden_meta_boxes', [$this, 'defaultHiddenMetaBoxes'], 10, 2);
    }

    public function wpDashboardSetup()
    {
        add_meta_box('get-started', 'Get Started', [$this, 'callback'], get_current_screen(), 'normal', 'high');
    }

    public function callback()
    {
        ?>

        <p>GDS provides this WordPress platform for building and managing your new campaign website.</p>

        <p>Before you get started, we advise you to read the help and guidance listed below, and then go through these steps.</p>

        <h3>Help and guidance</h3>

        <p><a href="<?php echo esc_attr(network_site_url('/user-guide/')) ?>" class="button button-primary">GOV.UK Campaigns Platform user guide</a></p>

        <p><a href="<?php echo esc_attr(network_site_url('/style-guide/')) ?>" class="button button-primary">See a sample campaign site</a></p>

        <p><a href="https://www.gov.uk/guidance/content-design/writing-for-gov-uk" target="_blank" class="button button-primary">GDS guidelines for writing content</a></p>

        <h3>First steps to get you started</h3>

        <p><a href="<?php echo esc_attr(admin_url('post-new.php?post_type=page')) ?>" class="button button-primary">Build a homepage</a></p>

        <p><a href="<?php echo esc_attr(admin_url('themes.php?page=acf-options-sitewide-appearance')) ?>" class="button button-primary">Set the site appearance</a></p>

        <p><a href="<?php echo esc_attr(admin_url('nav-menus.php')) ?>" class="button button-primary">Build a navigation menu</a></p>

        <p><a href="#" class="button button-primary">Set up Google Analytics</a></p>

        <?php

    }

    public function defaultHiddenMetaBoxes(array $hidden, \WP_Screen $screen): array
    {
        if ($screen->id === 'dashboard') {
            $hidden[] = 'dashboard_activity';
            $hidden[] = 'dashboard_primary';
        }

        return $hidden;
    }
}
