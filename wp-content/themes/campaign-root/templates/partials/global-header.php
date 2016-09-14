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

<header role="banner" id="global-header" class="global-header">
    <div class="header-wrapper group">
    <div class="header-logo">
       <a href="/">
         <img src="<?php h()->assetPath('img/hmgov.png') ?>" width="208" height="31" alt="HM Government">
         <h1 class="visually-hidden"><?php bloginfo('name'); ?></h1>
         <p class="visually-hidden"><?php bloginfo('description'); ?></p>
       </a>
     </div>
     <?php get_template_part('partials/nav'); ?>
    </div>
</header>
