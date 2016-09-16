<?php
    the_post();
?>
<section class="single-article row">
    <div class="grid-row">

        <div class="article-comments">
            <?php get_template_part('partials/article'); ?>
            <?php comments_template('/comments.php'); ?>
        </div>

        <?php get_template_part('partials/sidebar'); ?>

    </div>
</section>
