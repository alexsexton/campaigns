<?php
//
// Content Block ### Title
//
if( get_row_layout() == 'link_block') : ?>

<section class="link-block">
        <div class="row">
            <?php if( have_rows('links')) : ?>
            <ul>
                <?php while( have_rows('links')) : the_row() ?>
                <li><a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('title'); ?></li></a>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
</section>

<?php endif; ?>
