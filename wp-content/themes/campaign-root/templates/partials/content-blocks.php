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
        $hero_background = get_sub_field('background');
        $hero_text_colour = get_sub_field('text_colour');

        if( get_sub_field('image')) {
          $hero_image = get_sub_field('image');
        };
      ?>

        <div class="hero <?php echo $hero_background;?>">

          <div class="overlay <?php echo $hero_text_colour;?>">
            <h1><?php the_sub_field('title'); ?></h1>
            <div class="content rich-text">
              <p><?php the_sub_field('caption'); ?></p>
            </div>
          </div>

            <?php if( get_sub_field('image')) : ?>
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
        <header class="title">
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
        <header class="subtitle">
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

    <div class="promo-block row">

        <div class="promo-boxes">

        <?php // start promo boxes loop
        if( have_rows('promo_block') ):
        while ( have_rows('promo_block') ) : the_row(); ?>

            <?php if( get_row_layout() == 'promo') : ?>

            <?php
            // Some logic to add a relevant class name to the object
            if (get_sub_field('promo_title') && get_sub_field('promo_content') && get_sub_field('promo_image')) {
                $promo_class = ' title-content-image';
            } elseif (get_sub_field('promo_title') && get_sub_field('promo_content')) {
                $promo_class = ' title-content';
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
                        <?php if( get_sub_field('promo_content')) : ?>
                            <?php the_sub_field('promo_content'); ?>
                        <?php endif; ?>
                    </div>

                    <?php if( get_sub_field('promo_url')) : ?>
                        <div class="buttons">
                            <a href="<?php the_sub_field('promo_url'); ?>" class="button"><?php the_sub_field('promo_button_text'); ?></a>
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

    <?php endif; ?>


    <?php
    //
    // Content Block ### Content Only
    //
    if( get_row_layout() == 'content') : ?>

      <?php if( get_sub_field('content')) : ?>
        <div class="content-only row">
          <div class="rich-text">
            <?php the_sub_field('content'); ?>
          </div>
        </div>
      <?php endif; ?>

    <?php endif; ?>


    <?php
    //
    // Content Block ### Call to Action
    //
    if( get_row_layout() == 'call_to_action') : ?>
    <div class="row">
        <div class="call-to-action">

            <?php if( get_sub_field('title')) : ?><h2><?php the_sub_field('title'); ?></h2><?php endif; ?>

            <div class="buttons">
                <a href="<?php the_sub_field('button_url'); ?>" class="button" <?php if( get_sub_field('ga_event_tracking') == true): ?> onclick="ga('send', 'event', '<?php the_sub_field('event_category'); ?>', '<?php the_sub_field('event_action'); ?>', '<?php the_sub_field('event_label'); ?>');"<?php endif; ?>><?php the_sub_field('button_text'); ?></a>
            </div>

        </div>
    </div>
    <?php endif; ?>

    <?php
    //
    // Content Block ### Left-Aligned Image and Caption
    //
    if( get_row_layout() == 'left_aligned_image') : ?>
        <div class="left-image-caption row">

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

    <?php endif; ?>

    <?php
    //
    // Content Block ### Right-Aligned Image and Caption
    //
    if( get_row_layout() == 'right_aligned_image') : ?>
        <div class="right-image-caption row">

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

    <?php endif; ?>


    <?php
    //
    // Content Block ### Full-Width Image
    //
    if( get_row_layout() == 'full_width_image') : ?>
    <div class="full-width-image row">

      <?php $full_width_image = get_sub_field('image'); ?>
        <figure>
          <?php if ($full_width_image['title']) {
          echo '<h3>' . $full_width_image['title'] . '</h3>';
          } ?>
          <img src="<?php echo $full_width_image['url']; ?>" alt="<?php echo $full_width_image['alt']; ?>">
          <?php if ($full_width_image['caption']) {
          echo '<figcaption>' . $full_width_image['caption'] . '</figcaption>';
          } ?>
        </figure>

    </div>
    <?php endif; ?>

    <?php
    //
    // Content Block ### Info Graphic
    //
    if( get_row_layout() == 'info_graphic') : ?>
    <div class="info-graphic row">

      <?php $info_graphic_image = get_sub_field('image'); ?>
        <figure>
          <img src="<?php echo $info_graphic_image['url']; ?>" alt="<?php echo $info_graphic_image['alt']; ?>">
          <?php if (get_sub_field('caption')) {
          echo '<figcaption><p>' . sub_field('caption') . '</p></figcaption>';
          } ?>
        </figure>

    </div>
    <?php endif; ?>

  <?php // end content block loop
    endwhile;
    endif;
  ?>

</section>
