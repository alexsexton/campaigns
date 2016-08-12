<?php if(get_field('facebook_id', 'option') || get_field('youtube_id', 'option') || get_field('twitter_id', 'option') || get_field('linkedin_id', 'option') ) : ?>
<div class="follow-us">
        <ul>
            <?php if( get_field('facebook_id', 'option') ) : ?>
            <li><a href="<?php the_field('facebook_id', 'option'); ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="#ffffff" class="inline-icon"><path d="M30.2 0H1.8C.8 0 0 .8 0 1.8v28.5c0 1 .8 1.8 1.8 1.8H17V20h-4v-5h4v-3.8c0-4.1 2.6-6.4 6.2-6.4C25 4.8 27 5 27 5v4.3h-2.6c-2 0-2.4 1-2.4 2.4V15h4.9l-.6 5H22v12h8.2c1 0 1.8-.8 1.8-1.8V1.8c0-1-.8-1.8-1.8-1.8z"/></svg>
            <span>Facebook</span></a>
            </li>
            <?php endif ?>

            <?php if( get_field('twitter_id', 'option') ) : ?>
            <li><a href="<?php the_field('twitter_id', 'option'); ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="#ffffff" class="inline-icon"><path d="M28.7 9.5v.9C28.7 19 22.1 29 10.1 29c-3.7 0-7.2-.8-10.1-2.7.5.1 1 .1 1.6.1 3.1 0 5.9-1.3 8.1-3.1-2.8 0-5.3-2-6.1-4.6.4.1.8.1 1.2.1.6 0 1.2-.1 1.8-.2-3-.6-5.3-3.2-5.3-6.4v-.1c.9.5 1.9.8 3 .8-1.8-1.2-2.9-3.2-2.9-5.4 0-1.2.3-2.2.9-3.2 3.3 4 8.1 6.4 13.5 6.7-.1-.5-.1-1-.1-1.5 0-3.6 2.9-6.5 6.5-6.5 1.8 0 3.5.8 4.8 2.1 1.5-.3 2.9-.8 4.1-1.6-.5 1.5-1.5 2.8-2.9 3.6 1.3-.2 2.6-.5 3.8-1-.9 1.3-2 2.4-3.3 3.4z"></svg>
            <span>Twitter</span></a>
            </li>
            <?php endif ?>

            <?php if( get_field('instagram_id', 'option') ) : ?>
            <li><a href="<?php the_field('instagram_id', 'option'); ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="#ffffff" class="inline-icon">
                    <path d="M16 2.9c4.3 0 4.8 0 6.5.1 1.6.1 2.4.3 3 .6.7.3 1.3.6 1.8 1.2.6.6.9 1.1 1.2 1.8.2.5.5 1.4.5 2.9.1 1.7.1 2.2.1 6.5s0 4.8-.1 6.5c-.1 1.6-.3 2.4-.6 3-.3.7-.6 1.3-1.2 1.8-.6.6-1.1.9-1.8 1.2-.6.2-1.4.5-3 .6-1.7.1-2.2.1-6.5.1s-4.8 0-6.5-.1c-1.6-.1-2.4-.3-3-.6-.7-.3-1.3-.6-1.8-1.2-.6-.6-.9-1.1-1.2-1.8-.1-.6-.4-1.5-.4-3-.1-1.7-.1-2.2-.1-6.5s0-4.8.1-6.5c0-1.5.3-2.4.5-2.9.3-.7.6-1.3 1.2-1.8.6-.6 1.1-.9 1.8-1.2.6-.3 1.5-.6 3-.6 1.7-.1 2.2-.1 6.5-.1M16 0c-4.3 0-4.9 0-6.6.1-1.7.1-2.9.3-3.9.7-1.1.4-1.9 1-2.8 1.8-.9 1-1.5 1.9-1.9 2.9-.4 1-.7 2.2-.7 3.9C0 11.1 0 11.7 0 16s0 4.9.1 6.6c.1 1.7.3 2.9.7 3.9.4 1.1 1 1.9 1.8 2.8.9.9 1.8 1.4 2.8 1.8 1 .4 2.2.7 3.9.7 1.8.2 2.4.2 6.7.2s4.9 0 6.6-.1c1.7-.1 2.9-.3 3.9-.7 1.1-.4 1.9-1 2.8-1.8.9-.9 1.4-1.8 1.8-2.8.4-1 .7-2.2.7-3.9.2-1.8.2-2.4.2-6.7s0-4.9-.1-6.6c-.1-1.7-.3-2.9-.7-3.9-.4-1.1-1-1.9-1.8-2.8-.9-.9-1.8-1.4-2.8-1.8-1-.4-2.2-.7-3.9-.7C20.9 0 20.3 0 16 0z"/><path d="M16 7.8c-4.5 0-8.2 3.7-8.2 8.2s3.7 8.2 8.2 8.2 8.2-3.7 8.2-8.2-3.7-8.2-8.2-8.2zm0 13.5c-2.9 0-5.3-2.4-5.3-5.3s2.4-5.3 5.3-5.3 5.3 2.4 5.3 5.3-2.4 5.3-5.3 5.3z"/><circle cx="24.5" cy="7.5" r="1.9"/>
                </svg>
            <span>Instagram</span></a>
            </li>
            <?php endif ?>

            <?php if( get_field('linkedin_id', 'option') ) : ?>
            <li><a href="<?php the_field('linkedin_id', 'option'); ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="#ffffff" class="inline-icon"><path d="M4 7.7C1.6 7.7 0 6 0 4 0 1.9 1.6.3 4 .3S8 1.9 8 4c0 2-1.6 3.7-4 3.7zM7.3 11v20.7H.7V11h6.6zM18 31.7h-6.7v-16s-.1-4-.1-4.7h6.6l.2 2.9c1.3-2 3.3-3.5 6-3.5 4.7 0 8 3.3 8 9.3v12h-6.7V20.3c0-3.3-1.6-4.7-3.6-4.7S18 17 18 19.7v12z"></svg>
            <span>Linkedin</span></a>
            </li>
            <?php endif ?>

            <?php if( get_field('youtube_id', 'option') ) : ?>
            <li><a href="<?php the_field('youtube_id', 'option'); ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="#ffffff" class="inline-icon"><path d="M32 16c0 11.3 0 11.3-16 11.3S0 27.3 0 16 0 4.7 16 4.7s16 0 16 11.3zm-10 0l-10-6v12l10-6z"></svg>
            <span>YouTube</span></a>
            </li>
            <?php endif ?>

        </ul>
</div>
<?php endif ?>
