<?php
//
// Content Block ### Quote Block
//
if( get_row_layout() == 'block_quote') : ?>
<div class="quote-block content-block">
    <div class="row">
        <?php if( get_sub_field('quote_citation_url')) : ?>
        <blockquote cite="<?php the_sub_field('quote_citation_url'); ?>">
            <h2><?php the_sub_field('quote_text'); ?></h2>
            <p><?php the_sub_field('quote_citation'); ?></p>
        </blockquote>
        <?php else : ?>
        <blockquote>
            <h2><?php the_sub_field('quote_text'); ?></h2>
        </blockquote>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
