<?php
//
// Content Block ### Content Only
//
if( get_row_layout() == 'text') : ?>

  <?php if( get_sub_field('content')) : ?>

    <?php $text_only_colour = get_sub_field('text_only_text_colour'); ?>

    <?php if( get_sub_field('text_only_background_colour')) : ?>
    <div id="text-only-p-<?php echo get_row_index(); ?>" class="text-only" style="background-color:<?php the_sub_field('background_colour'); ?>;">
    <?php else : ?>
    <div id="text-only-<?php echo get_row_index(); ?>" class="text-only">
    <?php endif; ?>
        <div class="row">
            <article class="rich-text <?php echo $text_only_colour;?>">
                <?php the_sub_field('content'); ?>
            </article>
        </div>
    </div>
  <?php endif; ?>

<?php endif; ?>
