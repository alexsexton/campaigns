<section class="error row">
    <header>
        <h1>Page not found</h1>
    </header>
        <?php if( get_field('error_page_message', 'option') ) : ?>

            <article class="rich text">
                <?php the_field('error_page_message', 'option'); ?>
            </article>

        <?php else : ?>

            <article class="rich text">
                <p>If you entered a web address please check it was correct.</p>

                <p>You can also <a href="https://www.gov.uk/search">search GOV.UK</a> or <a href="/">browse from the homepage</a> to find the information you need.</p>
            </article>

        <?php endif ?>

</section>
