<?php
//
// Content Block ### Statistic
//
if (get_row_layout() == 'statistic') : ?>

<div id="statistic-p-<?php echo get_row_index(); ?>" class="statistic content-block">
    <div class="row">
        <div class="data">
            <?php if (get_sub_field('statistic_data_value')) : ?>
                <h2><?php the_sub_field('statistic_data_value'); ?></h2>
            <?php endif; ?>

            <?php if (get_sub_field('statistic_data_value_description')) : ?>
                <p><?php the_sub_field('statistic_data_value_description'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
