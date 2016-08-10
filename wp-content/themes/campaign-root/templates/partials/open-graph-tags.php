<meta property="og:title" content="<?php the_title(); ?>">
<meta property="og:type" content="image/png">
<meta property="og:url" content="<?php the_permalink(); ?>">
<meta property="og:image" content="<?php h()->assetPath('img/opengraph-image.png') ?>">
<?php if (is_front_page() && get_field('site_tagline', 'option') != '') : ?>
<meta property="og:description" content="<?php esc_html(the_field('site_tagline', 'option')); ?>">
<?php else : ?>
<meta property="og:description" content="<?php esc_html(the_field('description')); ?>">
<?php endif; ?>

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php the_field('twitter_handle','option'); ?>">
<meta name="twitter:title" content="<?php the_title(); ?>">
<meta name="twitter:image" content="<?php h()->assetPath('img/opengraph-image.png') ?>">
<?php if (is_front_page() && get_field('site_tagline', 'option') != '') : ?>
<meta name="twitter:description" content="<?php esc_html(the_field('site_tagline', 'option')); ?>">
<?php else : ?>
<meta name="twitter:description" content="<?php esc_html(the_field('description')); ?>">
<?php endif; ?>
