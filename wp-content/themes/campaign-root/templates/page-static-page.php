<?php
    // Template name: Page
    the_post();
?>

<?php get_template_part('partials/page'); ?>

<?php
$post = get_the_ID();
$args = array(
  'post_type'      => 'page',
  'posts_per_page' => -1,
  'post_parent'    => $post,
  'order'          => 'ASC',
  'orderby'        => 'name'
);
$parent = new WP_Query( $args ); ?>

<?php if ($parent->have_posts() ) : ?>
    <section class="child-pages row">
        <h2>In this section</h2>
        <ul>
            <?php while ($parent->have_posts() ) : $parent->the_post(); ?>
                <li class="child-page">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
                    <?php if( get_field('description') ) : ?>
                        <p><?php the_field('description'); ?></p>
                    <?php endif ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>
<?php endif; wp_reset_query(); ?>
