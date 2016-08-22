<?php

namespace Dxw\GdsCampaignRoot\Wizard;

class AnalyticsScript implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('campaigns_after_body', [$this, 'campaignsAfterBody']);
    }

    public function campaignsAfterBody()
    {
        if (!empty(get_option('campaigns_gtm_id'))) {
            ?>
            <noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php echo esc_js(get_option('campaigns_gtm_id')) ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            ;})(window,document,'script','dataLayer','<?php echo esc_js(get_option('campaigns_gtm_id')) ?>');</script>
            <?php
            return;
        }

        if (!empty(get_option('campaigns_ga_id'))) {
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
            return;
        }
    }
}
