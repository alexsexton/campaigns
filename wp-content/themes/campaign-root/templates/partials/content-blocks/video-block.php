<?php
//
// Content Block ### Video Block
//
if( get_row_layout() == 'video') : ?>

<?php if( get_sub_field('background_colour')) : ?>
<div id="video-block-p-<?php echo get_row_index(); ?>" class="video-block content-block" style="background-color:<?php the_sub_field('background_colour'); ?>;">
<?php else : ?>
<div id="video-block-p-<?php echo get_row_index(); ?>" class="video-block content-block">
<?php endif; ?>
    <div class="row">
        <div class="fitvids">
          <?php
            $fullpath = get_sub_field('video_link');
            $videoid = preg_split('/(\?[v]\=)/', $fullpath);
          ?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoid[1]; ?>?feature=oembed" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php endif; ?>
