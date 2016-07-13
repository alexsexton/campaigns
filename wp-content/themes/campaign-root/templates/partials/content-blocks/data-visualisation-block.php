<?php
//
// Content Block ### Data Visualisation
//
if (get_row_layout() == 'data_visualisation') : ?>

<div class="data-visualisation content-block">
    <div class="row">
        <div class="data">
            <?php if (get_sub_field('data_value')) : ?>
                <h2><?php the_sub_field('data_value'); ?></h2>
            <?php endif; ?>

            <?php if (get_sub_field('data_value_text')) : ?>
                <p><?php the_sub_field('data_value_text'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<script type="text/javascript">

jQuery(function () {
    var s = $('.data h2');
    console.log(s);

    if($('.data h2').indexOf('%') !== -1){
        $(this).wrap('<span></span>');
    }
});

</script>
