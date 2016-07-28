<?php
//
// Content Block ### Hidden Help Text
//
if( get_row_layout() == 'hidden_help_text') : ?>

<?php $hidden_text_colour = get_sub_field('hidden_help_text'); ?>

<?php if( get_sub_field('background_colour')) : ?>
<div class="hidden-help-text content-block <?php echo $hidden_text_colour;?>" style="background-color:<?php the_sub_field('background_colour'); ?>;">
<?php else : ?>
<div class="hidden-help-text content-block <?php echo $hidden_text_colour;?>">
<?php endif; ?>
    <div class="row">
        <details>
          <summary><span class="summary"><?php the_sub_field('summary'); ?></span></summary>
          <div class="panel">
              <p><?php the_sub_field('details'); ?></p>
          </div>
        </details>
    </div>
</div>
<?php endif; ?>
