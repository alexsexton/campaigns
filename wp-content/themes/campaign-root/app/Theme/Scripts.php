<?php

namespace Dxw\GdsCampaignRoot\Theme;

class Scripts implements \Dxw\Iguana\Registerable
{
    public function __construct(\Dxw\Iguana\Theme\Helpers $helpers)
    {
        $helpers->registerFunction('assetPath', [$this, 'assetPath']);
        $helpers->registerFunction('getAssetPath', [$this, 'getAssetPath']);
    }

    public function register()
    {
        add_action('wp_enqueue_scripts', [$this, 'wpEnqueueScripts']);
        add_action('wp_print_scripts', [$this, 'wpPrintScripts']);
        add_action('admin_head', [$this, 'acfMarkdown']);
    }

    // Adds a border to acf-markdown fields in the editor is there a better way to do this?
    public function acfMarkdown() {
        echo '
        <style>
            .acf-field-markdown-editor iframe { border: 1px solid #ddd; }
        </style>';
    }

    public function getAssetPath($path)
    {
        return dirname(get_stylesheet_directory_uri()).'/static/'.$path;
    }

    public function assetPath($path)
    {
        echo esc_url($this->getAssetPath($path));
    }

    public function wpEnqueueScripts()
    {
        //
        // Do not add javascript to your theme here, unless you're sure you should.
        //
        // Normally, you should add Javascript to assets/js/main.js or make a file in assets/js/plugins.
        //
        // You can/should enqueue a script here only if it is a widely used library that is required by a plugin (or is likely to be later)
        //

        // We need to register our own jQuery, because WP is on jQuery 2.x which breaks support for IE 6-8.
        // This will not affect admin pages
        // This will break any plugin that requires a feature/behaviour in jQuery 2.x which is missing/different in jQuery 1.10.x
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery',   $this->getAssetPath('lib/jquery.min.js'));

        // Because it's awesome
        wp_enqueue_script('modernizr', $this->getAssetPath('lib/modernizr.min.js'));

        // Pretty much everything else should be compiled by Grunt.
        wp_enqueue_script('main',      $this->getAssetPath('main.min.js'), array('jquery', 'modernizr'), '', true);

        wp_enqueue_style('govuk-template',      $this->getAssetPath('govuk-template.min.css'));

        wp_enqueue_style('govuk-template-fonts',      $this->getAssetPath('fonts.min.css'));

        wp_enqueue_style('main',      $this->getAssetPath('main.min.css'));
    }

    public function wpPrintScripts()
    {
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Prefetch external asset dns -->
        <link rel="dns-prefetch" href="#">

        <link rel="shortcut icon" href="<?php $this->assetPAth('img/favicon.ico')?>" type="image/x-icon">
        <link rel="mask-icon" href="<?php $this->assetPAth('img/gov.uk_logotype_crown.svg')?>" color="#0b0c0c">
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php $this->assetPAth('img/apple-touch-icon-152x152.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php $this->assetPAth('img/apple-touch-icon-120x120.png') ?>">
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php $this->assetPAth('img/apple-touch-icon-76x76.png') ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php $this->assetPAth('img/apple-touch-icon-60x60.png') ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php $this->assetPath('img/apple-touch-icon-152x152.png') ?>">
        <?php

    }
}
