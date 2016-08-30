<?php
//
// Content Block ### Heading
//
if( get_row_layout() == 'heading') : ?>

  <?php if( get_sub_field('title')) : ?>
      <?php $align = get_sub_field('text_align') ?>
        <?php if( get_sub_field('heading_background_colour')) : ?>
            <header id="heading-p-<?php echo get_row_index(); ?>" class="heading <?php echo $align; ?>" style="background-color:<?php the_sub_field('heading_background_colour'); ?>;">
        <?php else : ?>
            <header id="heading-p-<?php echo get_row_index(); ?>" class="heading <?php echo $align; ?>">
        <?php endif; ?>
        <div class="row">
            <?php if( get_sub_field('heading_text_colour')) : ?>
            <h2 style="color:<?php the_sub_field('heading_text_colour'); ?>;"><?php the_sub_field('title'); ?></h2>
            <?php else : ?>
            <h2 ><?php the_sub_field('title'); ?></h2>
            <?php endif; ?>
        </div>
    </header>
  <?php endif; ?>

<?php endif; ?>
