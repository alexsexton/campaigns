<?php
//
// Content Block ### Boxes
//
if( get_row_layout() == 'boxes') : ?>

<div id="box-block-p-<?php echo get_row_index(); ?>" class="promo-block content-block">
    <div class="row">
        <div class="promo-boxes">

        <?php // start promo boxes loop
        if( have_rows('boxes') ):
        while ( have_rows('boxes') ) : the_row(); ?>

            <?php if( get_row_layout() == 'box') : ?>

            <?php
            // Some logic to add a relevant class name to the object
            if (get_sub_field('box_title') && get_sub_field('box_caption') && get_sub_field('box_image')) {
                $box_class = ' title-content-image';
            } elseif (get_sub_field('box_title') && get_sub_field('box_caption')) {
                $box_class = ' title-content';
            } elseif (get_sub_field('box_title') && get_sub_field('box_image')) {
                $box_class = ' title-image';
            } else {
                $box_class = ' title-only';
            }
            ?>

            <div class="promo-box<?php echo $box_class; ?>">
                <div class="promo-box-inner">

                    <?php if( get_sub_field('box_image')) : ?>
                    <div class="promo-image">
                        <?php $box_image = get_sub_field('box_image'); ?>
                        <img src="<?php echo $box_image['url']; ?>" alt="<?php echo $box_image['alt']; ?>">
                    </div>
                    <?php endif; ?>

                    <?php if( get_sub_field('box_title')) : ?>
                        <h2><?php the_sub_field('box_title'); ?></h2>
                    <?php endif; ?>

                    <div class="rich-text">
                        <?php if( get_sub_field('box_caption')) : ?>
                            <?php the_sub_field('box_caption'); ?>
                        <?php endif; ?>
                    </div>

                    <?php if( get_sub_field('box_button_url')) : ?>
                        <div class="buttons">
                            <a href="<?php the_sub_field('box_button_url'); ?>" class="button"><?php the_sub_field('box_button_text'); ?></a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php endif; ?>

        <?php // end boxes loop
          endwhile;
          endif; ?>

        </div>
    </div>
</div>

<?php endif; ?>
