<script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>

<div id="skiplink-container">
 <div>
   <a href="#content" class="skiplink">Skip to main content</a>
 </div>
</div>

<!--[if lt IE 7]>
   <div class="alert"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div>
<![endif]-->

<div id="global-cookie-message">
   <p>GOV.UK uses cookies to make the site simpler. <a href="https://www.gov.uk/help/cookies">Find out more about cookies</a></p>
</div>

<header role="banner" id="global-header" class="global-header group">
    <div class="header-wrapper group">
        <div class="header-global">
         <div class="header-logo">
           <a href="/" title="Go to the GOV.UK homepage" id="logo">
             <img src="<?php h()->assetPath('img/hmgov.png') ?>" width="208" height="31" alt="HM Goverment">
           </a>
         </div>
         <?php get_template_part('partials/nav'); ?>
        </div>
    </div>

    <?php if( get_field('header_background_colour', 'option')) : ?>
    <div class="site-header" style="background-color:<?php the_field('header_background_colour', 'option'); ?>;">
    <?php elseif ( get_field('header_background_image', 'option')) : ?>
    <div class="site-header has-background-image">
    <?php else : ?>
    <div class="site-header">
    <?php endif ?>
        <div class="row">
         <div class="logo">
             <a href="/"></a>
             <?php if( get_field('site_logo', 'option') ) : ?>
                 <?php $site_logo = get_field('site_logo', 'option'); ?>
                 <img src="<?php echo $site_logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
             <?php else : ?>
                 <h1><?php bloginfo('name'); ?></h1>
             <?php endif ?>
         </div>
         <?php if( get_field('site_tagline', 'option') ) : ?>
             <?php $tagline_colour = get_field('tagline_colour', 'option'); ?>
             <div class="description">
                 <p class="<?php echo $tagline_colour; ?>"><?php the_field('site_tagline', 'option'); ?></p>
             </div>
         <?php endif ?>
        </div>
    </div>


</header>
