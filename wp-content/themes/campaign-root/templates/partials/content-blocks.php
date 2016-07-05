<section class="content-blocks">

  <?php // start content block loop
  if( have_rows('content_blocks') ):
  while ( have_rows('content_blocks') ) : the_row(); ?>

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

        <div class="hero content-block <?php echo $hero_background;?>">

          <div class="overlay <?php echo $hero_text_colour;?>">
            <h1><?php the_sub_field('title'); ?></h1>
            <div class="content rich-text">
              <p><?php the_sub_field('caption'); ?></p>
            </div>

            <?php if( get_sub_field('button_url') && get_sub_field('button_text')) : ?>
            <div class="buttons">
                <a href="<?php the_sub_field('button_url'); ?>" class="button" <?php if( get_sub_field('ga_event_tracking') == true): ?> onclick="ga('send', 'event', '<?php the_sub_field('event_category'); ?>', '<?php the_sub_field('event_action'); ?>', '<?php the_sub_field('event_label'); ?>');"<?php endif; ?>><?php the_sub_field('button_text'); ?></a>
            </div>
            <?php endif; ?>

          </div>


            <?php if($hero_image) : ?>
              <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>">
            <?php endif; ?>

        </div>
    <?php endif; ?>

    <?php
    //
    // Content Block ### Title
    //
    if( get_row_layout() == 'title') : ?>

      <?php if( get_sub_field('title')) : ?>
            <?php if( get_sub_field('background_colour')) : ?>
                <header class="title content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
            <?php else : ?>
                <header class="title content-block">
            <?php endif; ?>
            <div class="row">
                <h1><?php the_sub_field('title'); ?></h1>
            </div>
        </header>
      <?php endif; ?>

    <?php endif; ?>


    <?php
    //
    // Content Block ### Subtitle
    //
    if( get_row_layout() == 'subtitle') : ?>

      <?php if( get_sub_field('subtitle')) : ?>
          <?php if( get_sub_field('background_colour')) : ?>
              <header class="subtitle content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
          <?php else : ?>
              <header class="subtitle content-block">
          <?php endif; ?>
            <div class="row">
                <h2><?php the_sub_field('subtitle'); ?></h2>
            </div>
        </header>
      <?php endif; ?>

    <?php endif; ?>

    <?php
    //
    // Content Block ### Promo Box
    //
    if( get_row_layout() == 'promo_boxes') : ?>

    <div class="promo-block content-block">

        <div class="row">

            <div class="promo-boxes">

            <?php // start promo boxes loop
            if( have_rows('promo_block') ):
            while ( have_rows('promo_block') ) : the_row(); ?>

                <?php if( get_row_layout() == 'promo') : ?>

                <?php
                // Some logic to add a relevant class name to the object
                if (get_sub_field('promo_title') && get_sub_field('promo_caption') && get_sub_field('promo_image')) {
                    $promo_class = ' title-content-image';
                } elseif (get_sub_field('promo_title') && get_sub_field('promo_caption')) {
                    $promo_class = ' title-content';
                } elseif (get_sub_field('promo_title') && get_sub_field('promo_image')) {
                    $promo_class = ' title-image';
                } else {
                    $promo_class = ' title-only';
                }
                ?>

                <div class="promo-box<?php echo $promo_class; ?>">
                    <div class="promo-box-inner">

                        <?php if( get_sub_field('promo_image')) : ?>
                        <div class="promo-image">
                            <?php $promo_image = get_sub_field('promo_image'); ?>
                            <img src="<?php echo $promo_image['url']; ?>" alt="<?php echo $promo_image['alt']; ?>">
                        </div>
                        <?php endif; ?>

                        <?php if( get_sub_field('promo_title')) : ?>
                            <h2><?php the_sub_field('promo_title'); ?></h2>
                        <?php endif; ?>

                        <div class="rich-text">
                            <?php if( get_sub_field('promo_caption')) : ?>
                                <?php the_sub_field('promo_caption'); ?>
                            <?php endif; ?>
                        </div>

                        <?php if( get_sub_field('promo_button_url')) : ?>
                            <div class="buttons">
                                <a href="<?php the_sub_field('promo_button_url'); ?>" class="button"><?php the_sub_field('promo_button_text'); ?></a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endif; ?>

            <?php // end promo boxes loop
              endwhile;
              endif; ?>

            </div>

        </div>

    </div>

    <?php endif; ?>


    <?php
    //
    // Content Block ### Content Only
    //
    if( get_row_layout() == 'content') : ?>

      <?php if( get_sub_field('content')) : ?>

        <?php $content_text_colour = get_sub_field('text_colour'); ?>

        <?php if( get_sub_field('background_colour')) : ?>
        <div class="content-only content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
        <?php else : ?>
        <div class="content-only content-block">
        <?php endif; ?>
            <div class="row">
                <article class="rich-text  <?php echo $content_text_colour;?>">
                    <?php the_sub_field('content'); ?>
                </article>
            </div>
        </div>
      <?php endif; ?>

    <?php endif; ?>


    <?php
    //
    // Content Block ### Call to Action
    //
    if( get_row_layout() == 'call_to_action') : ?>
    <?php if( get_sub_field('background_colour')) : ?>
    <div class="call-to-action-block content-block" style="background-colour:<?php the_sub_field('background_colour'); ?>;">
    <?php else : ?>
    <div class="call-to-action-block content-block">
    <?php endif; ?>
        <div class="row">
            <div class="call-to-action">

                <?php if( get_sub_field('title')) : ?><h2><?php the_sub_field('title'); ?></h2><?php endif; ?>

                <div class="buttons">
                    <a href="<?php the_sub_field('button_url'); ?>" class="button" <?php if( get_sub_field('ga_event_tracking') == true): ?> onclick="ga('send', 'event', '<?php the_sub_field('event_category'); ?>', '<?php the_sub_field('event_action'); ?>', '<?php the_sub_field('event_label'); ?>');"<?php endif; ?>><?php the_sub_field('button_text'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php
    //
    // Content Block ### Left-Aligned Image and Caption
    //
    if( get_row_layout() == 'left_aligned_image') : ?>
        <div class="left-image-caption content-block">
            <div class="row">

              <?php $left_aligned_image = get_sub_field('image'); ?>

              <figure>
                  <img src="<?php echo $left_aligned_image['url']; ?>" alt="<?php echo $left_aligned_image['alt']; ?>">
                <?php if( $left_aligned_image['caption'] ) : ?>
                <figcaption>
                  <?php if( $left_aligned_image['title'] ) : ?>
                    <h3><?php echo $left_aligned_image['title']; ?></h3>
                  <?php endif; ?>
                  <?php echo $left_aligned_image['caption']; ?>
                </figcaption>
                <?php endif; ?>
              </figure>

            </div>
      </div>

    <?php endif; ?>

    <?php
    //
    // Content Block ### Right-Aligned Image and Caption
    //
    if( get_row_layout() == 'right_aligned_image') : ?>
        <div class="right-image-caption content-block">
            <div class="row">

              <?php $right_aligned_image = get_sub_field('image'); ?>

              <figure>
                  <img src="<?php echo $right_aligned_image['url']; ?>" alt="<?php echo $right_aligned_image['alt']; ?>">
                <?php if( $right_aligned_image['caption'] ) : ?>
                <figcaption>
                  <?php if( $right_aligned_image['title'] ) : ?>
                    <h3><?php echo $right_aligned_image['title']; ?></h3>
                  <?php endif; ?>
                  <?php echo $right_aligned_image['caption']; ?>
                </figcaption>
                <?php endif; ?>
              </figure>

        </div>
      </div>

    <?php endif; ?>


    <?php
    //
    // Content Block ### Full-Width Image
    //
    if( get_row_layout() == 'full_width_image') : ?>
    <div class="full-width-image content-block">
        <div class="row">

          <?php $full_width_image = get_sub_field('image'); ?>
            <figure>
              <img src="<?php echo $full_width_image['url']; ?>" alt="<?php echo $full_width_image['alt']; ?>">
              <figcaption>
                  <?php if ($full_width_image['title']) {
                  echo '<h2>' . $full_width_image['title'] . '</h2>';
                  } ?>
                  <?php if ($full_width_image['caption']) {
                  echo '<p>' . $full_width_image['caption'] . '</p>';
                  } ?>
              </figcaption>
            </figure>
        </div>
    </div>
    <?php endif; ?>

    <?php
    //
    // Content Block ### Info Graphic
    //
    if( get_row_layout() == 'info_graphic') : ?>
    <div class="info-graphic content-block">
        <div class="row">

          <?php $info_graphic_image = get_sub_field('image'); ?>
            <figure>
              <img src="<?php echo $info_graphic_image['url']; ?>" alt="<?php echo $info_graphic_image['alt']; ?>">
              <?php if (get_sub_field('caption')) {
              echo '<figcaption><p>' . the_sub_field('caption') . '</p></figcaption>';
              } ?>
            </figure>
        </div>
    </div>
    <?php endif; ?>

  <?php // end content block loop
    endwhile;
    endif;
  ?>

</section>
