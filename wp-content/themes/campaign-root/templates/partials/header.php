<?php if( get_field('header_background_colour', 'option')) : ?>
<header role="banner" id="site-header" class="site-header" style="background-color:<?php the_field('header_background_colour', 'option'); ?>;">
<?php else : ?>
<header role="banner" id="site-header" class="site-header">
<?php endif ?>
    <div class="row">
        <div class="logo">
            <a href="/"></a>
            <?php if( get_field('site_logo', 'option') ) : ?>
                <?php $site_logo = get_field('site_logo', 'option'); ?>
                <img src="<?php echo $site_logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
            <?php else : ?>
                <h1><?php bloginfo('name'); ?></h1>
            <?php endif ?>
        </div>
        <?php if (get_bloginfo('description')) : ?>
            <div class="description">
                <p><?php bloginfo('description'); ?></p>
            </div>
        <?php endif ?>
    </div>
</header>
