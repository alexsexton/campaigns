<?php
//
// Content Block ### Promo Box
//
if( get_row_layout() == 'promo_boxes') : ?>

<div id="promo-block-p-<?php echo get_row_index(); ?>" class="promo-block content-block">
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
