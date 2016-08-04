<?php
//
// Content Block ### Banner
//
if( get_row_layout() == 'banner') : ?>

  <?php
    $banner_background = get_sub_field('background_colour');
    $banner_text_colour = get_sub_field('text_colour');

    if( get_sub_field('background_image')) {
      $banner_image = get_sub_field('background_image');
    };
  ?>

    <?php if ($banner_background) : ?>
    <div id="banner-p-<?php echo get_row_index(); ?>" class="banner content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
    <?php else : ?>
    <div id="banner-p-<?php echo get_row_index(); ?>" class="banner content-block">
    <?php endif; ?>

    <?php if($banner_image) : ?>
      <img src="<?php echo $banner_image['url']; ?>" alt="<?php echo $banner_image['alt']; ?>">
    <?php endif; ?>

        <?php if ($banner_background && !$banner_image) : ?>
            <div class="overlay has-background-colour <?php echo $banner_text_colour;?>" style="background-color:<?php the_sub_field('background_colour'); ?>;">
            <?php elseif ($banner_background && $banner_image) : ?>
            <div class="overlay <?php echo $banner_text_colour;?>" style="background-color:<?php the_sub_field('background_colour'); ?>;">
            <?php else : ?>
            <div class="overlay <?php echo $banner_text_colour;?>">
          <?php endif; ?>

          <?php //var_dump($banner_image); ?>

        <h1><?php the_sub_field('title'); ?></h1>
        <div class="content rich-text">
          <?php the_sub_field('caption'); ?>
        </div>

        <?php if( get_sub_field('button_url') && get_sub_field('button_text')) : ?>
        <div class="buttons">
            <a href="<?php the_sub_field('button_url'); ?>" class="button" <?php if( get_sub_field('ga_event_tracking') == true): ?> onclick="ga('send', 'event', '<?php the_sub_field('event_category'); ?>', '<?php the_sub_field('event_action'); ?>', '<?php the_sub_field('event_label'); ?>');"<?php endif; ?>><?php the_sub_field('button_text'); ?></a>
        </div>
        <?php endif; ?>

      </div>

    </div>
<?php endif; ?>
