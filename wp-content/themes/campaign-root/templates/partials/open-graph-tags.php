<?php
    the_post();
?>

<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:type" content="image/png">
<meta property="og:url" content="">
<meta property="og:image" content="">
<meta property="og:description" content="">

<meta name="twitter:card" content="summary">
<meta name="twitter:creator" content="@yourhandle">
<meta name="twitter:site" content="@yourhandle">
<meta name="twitter:title" content="<?php the_title(); ?>">
<meta name="twitter:image" content="">

<?php if (is_home() && get_field('site_tagline', 'option') != '') : ?>
    <meta name="twitter:description" content="<?php the_field('site_tagline', 'option'); ?>">
<?php endif; ?>
<?php if (is_page_template('templates/page-static-page.php')) : ?>
    <meta name="twitter:description" content="<?php echo esc_html(get_the_excerpt()); ?>">
<?php endif; ?>
<?php if (is_page_template('templates/page.php')) : ?>
    <meta name="twitter:description" content="<?php echo esc_html(the_field('description')); ?>">
<?php endif; ?>
