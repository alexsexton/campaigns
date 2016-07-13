<?php
//
// Content Block ### Video Block
//
if( get_row_layout() == 'video_content') : ?>
<div class="video-block content-block">
    <div class="row">
        <div class="fitvids"><?php the_sub_field('video'); ?></div>
    </div>
</div>
<?php endif; ?>
