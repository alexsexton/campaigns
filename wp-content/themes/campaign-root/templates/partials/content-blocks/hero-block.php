<?php
//
// Content Block ### Hero
//
if( get_row_layout() == 'hero') : ?>

  <?php
    $hero_background = get_sub_field('background_colour');
    $hero_text_colour = get_sub_field('text_colour');

    if( get_sub_field('background_image')) {
      $hero_image = get_sub_field('background_image');
    };
  ?>

    <?php if (get_sub_field('background_colour')) : ?>
    <div class="hero content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
    <?php else : ?>
    <div class="hero content-block">
    <?php endif; ?>

    <?php if($hero_image) : ?>
      <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>">
    <?php endif; ?>

        <?php if (get_sub_field('background_colour')) : ?>
            <div class="overlay has-background-colour <?php echo $hero_text_colour;?>">
            <?php else : ?>
            <div class="overlay <?php echo $hero_text_colour;?>">
          <?php endif; ?>
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
