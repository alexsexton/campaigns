<?php
//
// Content Block ### Call to Action Banner
//
if( get_row_layout() == 'call_to_action_banner') : ?>
<?php
if( get_sub_field('cta_banner_text_align')) {
    $text_align = get_sub_field('cta_banner_text_align');
}
?>

<?php if( get_sub_field('cta_banner_background_image') && get_sub_field('cta_banner_text_colour')) : ?>

<div id="call-to-action-banner-p-<?php echo get_row_index(); ?>" class="call-to-action-banner has-background-image <?php echo $text_align; ?>" style="color:<?php the_sub_field('cta_banner_text_colour'); ?>">

<?php elseif( get_sub_field('cta_banner_background_colour') && get_sub_field('cta_banner_text_colour')) : ?>

<div id="call-to-action-banner-p-<?php echo get_row_index(); ?>" class="call-to-action-banner <?php echo $text_align; ?>" style="color:<?php the_sub_field('cta_banner_text_colour'); ?>;background-color:<?php the_sub_field('cta_banner_background_colour'); ?>;">

<?php elseif( get_sub_field('cta_banner_background_colour'))  : ?>

<div  id="call-to-action-banner-p-<?php echo get_row_index(); ?>" class="call-to-action-banner <?php echo $text_align; ?>" style="background-color:<?php the_sub_field('cta_banner_background_colour'); ?>;">

<?php else : ?>

<div  id="call-to-action-banner-p-<?php echo get_row_index(); ?>" class="call-to-action-banner <?php echo $text_align; ?>">

<?php endif; ?>

    <div class="row">
        <div class="call-to-action">

            <?php if( get_sub_field('title')) : ?><h2><?php the_sub_field('title'); ?></h2><?php endif; ?>

            <div class="buttons">
                <a href="<?php the_sub_field('button_url'); ?>" class="button <?php if( get_field('button_style', 'option') != 'default') { the_field('button_style', 'option'); } ?>"<?php if( get_sub_field('ga_event_tracking') == true): ?> onclick="ga('send', 'event', '<?php the_sub_field('event_category'); ?>', this.href, '<?php the_sub_field('button_text'); ?>');"<?php endif; ?>><?php the_sub_field('button_text'); ?></a>
            </div>
        </div>
    </div>

</div>

    <?php if( get_sub_field('cta_banner_background_image')) : ?>
    <?php $banner_background_image = get_sub_field('cta_banner_background_image'); ?>
    <script>
    jQuery(function ($) {
        $(function () {
          $('.call-to-action-banner').backstretch("<?php echo $banner_background_image['url']; ?>")
        })
    })
    </script>
    <?php endif; ?>

<?php endif; ?>
