<?php
//
// Content Block ### Banner
//
if( get_row_layout() == 'banner') : ?>

    <?php
    $banner_background = get_sub_field('background_colour');
    $banner_text_colour = get_sub_field('text_colour');
    $visibility = get_sub_field('accessibility');
    if( get_sub_field('background_image')) {
        $banner_image = get_sub_field('background_image');
    };
    ?>

    <?php if ($banner_background && !$banner_image) : ?>
    <div id="banner-p-<?php echo get_row_index(); ?>" class="banner banner-has-background-colour"  style="background-color:<?php the_sub_field('background_colour'); ?>;">
    <?php elseif ($banner_background) : ?>
    <div id="banner-p-<?php echo get_row_index(); ?>" class="banner" style="background-color:<?php the_sub_field('background_colour'); ?>;">
    <?php else : ?>
    <div id="banner-p-<?php echo get_row_index(); ?>" class="banner">
    <?php endif; ?>

    <?php if($banner_image) : ?>
        <img src="<?php echo $banner_image['url']; ?>" alt="<?php echo $banner_image['alt']; ?>">
    <?php endif; ?>

        <?php if ($banner_background && !$banner_image) : ?>
            <div class="overlay has-background-colour <?php echo $visibility; ?>">
        <?php else : ?>
            <div class="overlay">
         <?php endif; ?>

        <?php if( get_sub_field('title')): ?>
            <h2><?php the_sub_field('title'); ?></h2>
        <?php endif; ?>

        <?php if( get_sub_field('caption')): ?>
        <div class="content rich-text">
          <?php the_sub_field('caption'); ?>
        </div>
        <?php endif; ?>

        <?php if( get_sub_field('button_url') && get_sub_field('button_text')) : ?>
        <div class="buttons">
            <a href="<?php the_sub_field('button_url'); ?>" class="button <?php if( get_field('button_style', 'option') != 'default') { the_field('button_style', 'option'); } ?>"<?php if( get_sub_field('ga_event_tracking') == true): ?> onclick="ga('send', 'event', '<?php the_sub_field('event_category'); ?>', this.href, '<?php the_sub_field('button_text'); ?>');"<?php endif; ?>><?php the_sub_field('button_text'); ?></a>
        </div>
        <?php endif; ?>

      </div>

    </div>
<?php endif; ?>
