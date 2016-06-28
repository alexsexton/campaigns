<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php get_template_part('partials/govuk-header'); ?>

    <?php get_template_part('partials/header'); ?>

    <main class="main row" role="main">
        <?php h()->w_requested_template(); ?>
    </main>

    <?php get_template_part('partials/footer'); ?>

    <?php get_template_part('partials/govuk-footer'); ?>

    <?php wp_footer(); ?>
</body>
</html>
