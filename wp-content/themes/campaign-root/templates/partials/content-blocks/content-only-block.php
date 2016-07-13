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
