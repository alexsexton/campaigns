<?php

namespace Dxw\GdsCampaignRoot\Wizard;

class AnalyticsScript implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('wp_print_scripts', [$this, 'wpPrintScripts']);
    }

    public function wpPrintScripts()
    {
        if (empty(get_option('campaigns_ga_id'))) {
            return;
        }

        ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', '<?php echo esc_js(get_option('campaigns_ga_id')) ?>', 'auto');
            ga('send', 'pageview');
        </script>
        <?php

    }
}
