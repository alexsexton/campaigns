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
        add_meta_box('user-guide', 'User Guide', [$this, 'callback'], get_current_screen(), 'normal', 'high');
    }

    public function callback()
    {
        ?>
        <p>
            <a href="<?php echo esc_attr(network_site_url('/user-guide/')) ?>">User Guide</a>
        </p>

        <p>
            <a href="<?php echo esc_attr(admin_url('post-new.php?post_type=page')) ?>" class="button button-primary">Create a page</a>
            <a href="<?php echo esc_attr(admin_url('post-new.php')) ?>" class="button button-primary">Create a post</a>
        </p>
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
