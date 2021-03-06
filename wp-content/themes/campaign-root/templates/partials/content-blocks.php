<section class="content-blocks">

  <?php // start content block loop
    if( have_rows('content_blocks') ):
    while ( have_rows('content_blocks') ) : the_row(); ?>

        <?php get_template_part('partials/content-blocks/banner-block'); ?>

        <?php get_template_part('partials/content-blocks/heading-block'); ?>

        <?php get_template_part('partials/content-blocks/boxes-block'); ?>

        <?php get_template_part('partials/content-blocks/text-only-block'); ?>

        <?php get_template_part('partials/content-blocks/call-to-action'); ?>

        <?php get_template_part('partials/content-blocks/left-aligned-image-block'); ?>

        <?php get_template_part('partials/content-blocks/right-aligned-image-block'); ?>

        <?php get_template_part('partials/content-blocks/full-width-image-block'); ?>

        <?php get_template_part('partials/content-blocks/video-block'); ?>

        <?php get_template_part('partials/content-blocks/statistic-block'); ?>

        <?php get_template_part('partials/content-blocks/quote-block'); ?>

        <?php get_template_part('partials/content-blocks/hidden-help-text-block'); ?>

  <?php // end content block loop
    endwhile;
    endif;
  ?>

</section>
