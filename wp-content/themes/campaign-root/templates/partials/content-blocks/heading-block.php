<?php
//
// Content Block ### Heading
//
if( get_row_layout() == 'heading') : ?>

  <?php if( get_sub_field('title')) : ?>
      <?php $align = get_sub_field('text_align') ?>
        <?php if( get_sub_field('background_colour')) : ?>
            <header id="heading-p-<?php echo get_row_index(); ?>" class="heading content-block <?php echo $align; ?>" style="background-color:<?php the_sub_field('background_colour'); ?>;">
        <?php else : ?>
            <header id="heading-p-<?php echo get_row_index(); ?>" class="heading content-block <?php echo $align; ?>">
        <?php endif; ?>
        <div class="row">
            <h2><?php the_sub_field('title'); ?></h2>
        </div>
    </header>
  <?php endif; ?>

<?php endif; ?>
