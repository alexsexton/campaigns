
<section class="single row">
    <div class="grid-row">

        <div class="article-comments">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('partials/article');
            get_template_part('partials/sidebar');
            comments_template('/comments.php');
        }
        ?>
        </div>

    </div>
</section>
