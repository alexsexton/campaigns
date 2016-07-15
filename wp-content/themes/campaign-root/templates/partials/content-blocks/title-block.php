<?php
//
// Content Block ### Title
//
if( get_row_layout() == 'title') : ?>

  <?php if( get_sub_field('title')) : ?>
        <?php if( get_sub_field('background_colour')) : ?>
            <header class="title content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
        <?php else : ?>
            <header class="title content-block">
        <?php endif; ?>
        <div class="row">
            <h2><?php the_sub_field('title'); ?></h2>
        </div>
    </header>
  <?php endif; ?>

<?php endif; ?>
