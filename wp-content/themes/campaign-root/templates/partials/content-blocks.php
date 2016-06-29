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
    if( get_row_layout() == 'promo_box') : ?>
      <?php $background = get_sub_field('background'); ?>
      <div class="promo-box <?php echo $background; ?>">

          <div class="promo-image">
            <?php if( get_sub_field('image')) : ?>
              <?php $promo_image = get_sub_field('image'); ?>
              <img src="<?php echo $promo_image['url']; ?>" alt="<?php echo $promo_image['alt']; ?>">
            <?php endif; ?>
          </div>

          <article class="promo">
            <div class="rich-text">
            <?php if( get_sub_field('title')) : ?>
              <h2><?php the_sub_field('title'); ?></h2>
            <?php endif; ?>
            <?php if( get_sub_field('content')) : ?>
              <?php the_sub_field('content'); ?>
            <?php endif; ?>
            </div>
          </article>

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
            <?php if( $right_aligned_image['caption'] ) : ?>
            <figcaption>
              <?php if( $right_aligned_image['title'] ) : ?>
                <h3><?php echo $right_aligned_image['title']; ?></h3>
              <?php endif; ?>
              <?php echo $right_aligned_image['caption']; ?>
            </figcaption>
            <?php endif; ?>
              <img src="<?php echo $right_aligned_image['url']; ?>" alt="<?php echo $right_aligned_image['alt']; ?>">
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
