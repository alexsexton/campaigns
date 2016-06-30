<header role="banner" id="site-header" class="site-header">
    <div class="row">
        <div class="logo">
            <a href="/"><h1><?php bloginfo('name'); ?></h1></a>
        </div>
        <?php if (get_bloginfo('description')) : ?>
            <div class="description">
                <p><?php bloginfo('description'); ?></p>
            </div>
        <?php endif ?>
    </div>
</header>
