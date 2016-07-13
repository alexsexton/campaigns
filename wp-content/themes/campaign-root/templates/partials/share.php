<?php if( get_field('facebook_id', 'option') ) : ?>
    <?php $facebook_id = get_field('facebook_id', 'option'); ?>
<?php endif ?>

<?php if( get_field('twitter_id', 'option') ) : ?>
    <?php $twitter_id = get_field('twitter_id', 'option'); ?>
<?php endif ?>

<?php if( get_field('linkedin_id', 'option') ) : ?>
    <?php $linkedin_id = get_field('linkedin_id', 'option'); ?>
<?php endif ?>

<?php
    $post_url = get_the_permalink();
    $post_excerpt = strip_tags(get_the_excerpt());
    $post_title = strip_tags(get_the_title());
    $source = get_bloginfo('name');
?>

<section class="share-this">
    <div class="row">

    <h6>Share this</h6>

    <ul class="share-this">
        <li><a href="//www.facebook.com/dialog/sharer.php?href=<?php echo $post_url; ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="inline-icon"><path d="M24 12c0 5.6-3.8 10.3-9 11.6v-9.1h2.6l.4-3h-3V8.9c0-.9.4-1.4 1.3-1.4h1.9V4.7s-.9-.2-2.2-.2c-2.9 0-4.3 1.6-4.3 4v3H9v3h2.7V24C5.2 23.9 0 18.5 0 12 0 5.4 5.4 0 12 0s12 5.4 12 12z"/></svg>
        <span>Facebook</span></a>
        </li>

        <li><a href="//twitter.com/intent/tweet?text=&text;url=<?php echo $post_title; ?>&amp;url=<?php echo $post_url; ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="inline-icon"><path d="M24 12c0 6.6-5.4 12-12 12S0 18.6 0 12 5.4 0 12 0s12 5.4 12 12zm-3-4.4c-.6.3-1.3.4-2 .5.7-.4 1.2-1.1 1.5-1.9-.7.4-1.4.7-2.1.8-.6-.6-1.5-1-2.5-1-1.9 0-3.4 1.5-3.4 3.4 0 .2 0 .5.1.8-2.8-.1-5.4-1.5-7.1-3.6-.3.5-.4 1.1-.4 1.7 0 1.2.6 2.2 1.5 2.8-.6 0-1.1-.2-1.5-.4 0 1.7 1.2 3 2.7 3.4-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.4 1.7 2.3 3.2 2.3-1.2.9-2.6 1.6-4.2 1.6-.3 0-.6 0-.8-.1 1.5 1 3.3 1.5 5.2 1.5 6.3 0 9.7-5.2 9.7-9.7v-.3c.6-.5 1.1-1.1 1.6-1.8z"/></svg>
        <span>Twitter</span></a>
        </li>

        <li><a href="//www.linkedin.com/shareArticle?mini=true&amp;ampurl=<?php echo $post_url; ?>&amp;title=<?php echo $post_title; ?>&amp;summary=<?php echo $post_excerpt; ?>&amp;source=<?php echo $source; ?>" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="inline-icon"><path d="M24 12c0 6.6-5.4 12-12 12S0 18.6 0 12 5.4 0 12 0s12 5.4 12 12zM9 6.2c0-1-.8-1.7-2-1.7s-2 .8-2 1.7C5 7.2 5.8 8 7 8s2-.8 2-1.8zm-.5 3.3h-3V18h3V9.5zm11 4c0-2.8-1.4-4.5-3.5-4.5-1.2 0-2.1.7-2.5 1.8l-.1-1.3h-3c0 .3.1 2 .1 2V18h3v-4.5c0-1.2.6-2 1.5-2s1.5.5 1.5 2V18h3v-4.5z"/></svg>
        <span>Linkedin</span></a>
        </li>
    </ul>

    </div>
</section>


<?php
#
# Params for sharing buttons
# https://developers.facebook.com/docs/sharing/reference/share-dialog
# https://dev.twitter.com/web/tweet-button/parameters
# https://developer.linkedin.com/docs/share-on-linkedin
#
# See also https://www.facebook.com/dialog/share?app_id=180444840287&amp;href=http%3A%2F%2Fgu.com%2Fp%2F4zknm%2Fsfb&amp;redirect_uri=http%3A%2F%2Fgu.com%2Fp%2F4zknm%2Fsfb
#http://www.linkedin.com/shareArticle?mini=true&amp;title=Chef+Marco+Pierre+White%27s+wife+cleared+of+assaulting+sons&amp;url=http%3A%2F%2Fgu.com%2Fp%2F4zknm
#
?>
