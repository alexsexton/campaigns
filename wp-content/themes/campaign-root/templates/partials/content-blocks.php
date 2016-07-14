<section class="content-blocks">

  <?php // start content block loop
    if( have_rows('content_blocks') ):
    while ( have_rows('content_blocks') ) : the_row(); ?>

        <?php get_template_part('partials/content-blocks/hero-block'); ?>

        <?php get_template_part('partials/content-blocks/title-block'); ?>

        <?php get_template_part('partials/content-blocks/subtitle-block'); ?>

        <?php get_template_part('partials/content-blocks/promo-block'); ?>

        <?php get_template_part('partials/content-blocks/content-only-block'); ?>

        <?php get_template_part('partials/content-blocks/call-to-action-block'); ?>

        <?php get_template_part('partials/content-blocks/left-aligned-image-block'); ?>

        <?php get_template_part('partials/content-blocks/right-aligned-image-block'); ?>

        <?php get_template_part('partials/content-blocks/full-width-image-block'); ?>

        <?php get_template_part('partials/content-blocks/video-block'); ?>

        <?php get_template_part('partials/content-blocks/data-visualisation-block'); ?>

        <?php get_template_part('partials/content-blocks/quote-block'); ?>

        <?php get_template_part('partials/content-blocks/hidden-text-block'); ?>

  <?php // end content block loop
    endwhile;
    endif;
  ?>

</section>

<?php get_template_part('partials/share'); ?>
