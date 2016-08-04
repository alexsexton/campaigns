<?php
//
// Content Block ### Video Block
//
if( get_row_layout() == 'video_content') : ?>

<?php if( get_sub_field('background_colour')) : ?>
<div id="video-block-p-<?php echo get_row_index(); ?>" class="video-block content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
<?php else : ?>
<div id="video-block-p-<?php echo get_row_index(); ?>" class="video-block content-block">
<?php endif; ?>
    <div class="row">
        <div class="fitvids"><?php the_sub_field('video'); ?></div>
    </div>
</div>
<?php endif; ?>
