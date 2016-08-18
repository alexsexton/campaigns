<?php
//
// Content Block ### Call to Action Button
//
if( get_row_layout() == 'call_to_action_button') : ?>

<div id="call-to-action-button-p-<?php echo get_row_index(); ?>" class="call-to-action-button">
    <div class="row">
        <div class="buttons">
            <a href="<?php the_sub_field('button_url'); ?>" class="button button-big"<?php if( get_sub_field('ga_event_tracking') == true): ?> onclick="ga('send', 'event', '<?php the_sub_field('event_category'); ?>', this.href, '<?php the_sub_field('button_text'); ?>');"<?php endif; ?>><?php the_sub_field('button_text'); ?></a>
        </div>
    </div>
</div>
<?php endif; ?>
