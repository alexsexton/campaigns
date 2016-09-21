<?php
//
// Content Block ### Hidden Help Text
//
if( get_row_layout() == 'hidden_help_text') : ?>

<?php $hidden_text_colour = get_sub_field('hidden_help_text'); ?>

<?php if( get_sub_field('hidden_help_text_background_colour')) : ?>
    <div id="hidden-help-text-p-<?php echo get_row_index(); ?>" class="hidden-help-text <?php echo $hidden_text_colour;?>" style="background-color:<?php the_sub_field('hidden_help_text_background_colour'); ?>;">
    <?php else : ?>
        <div id="hidden-help-text-p-<?php echo get_row_index(); ?>" class="hidden-help-text <?php echo $hidden_text_colour;?>">
        <?php endif; ?>
        <div class="row">
            <div class="details">
                <div class="summary"><?php the_sub_field('summary'); ?></div>
                <div class="panel">
                    <?php the_sub_field('details'); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
