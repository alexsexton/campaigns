<?php
    // Template name: Application Form
    // Should we hide this template from the admin in subsites? It won't ever be used there.
?>

<section class="application-form">
    <div class="row">
        <header><h1><?php the_title(); ?></h1></header>
        <article class="content rich-text"><?php the_content(); ?></article>
    </div>
    <div class="row">
        <h1>Apply for a campaign site</h1>
        <?php h()->applicationForm() ?>
    </div>
</section>
