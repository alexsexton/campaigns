<div class="wrap">
    <h2>Set up analytics</h2>

    <div ng-app="wizard" ng-controller="Wizard" data-nonce="<?php echo esc_attr(wp_create_nonce('campaigns_wizard')) ?>">

        <p>To set up analytics for your campaign site, you need to follow the steps outlined below. You can visit this page at any time but you only need to set up analytics once to get it working.</p>

        <p>The GOV.UK Campaigns Platform gives you the option to use a Google Analytics (GA) account alone or use it in combination with a Google Tag Manager (GTM) account. WordPress will publish the necessary code to your site but you will need to configure the accounts.</p>

        <p>If you don’t have a Google account already click here to set one up. If you need a Google Analytics account you can visit this page to create one.</p>

        <h3>To set up Google Analytics only</h3>

        <p><label for="wizard_gaid">Enter your GA Tracking ID below (it looks something like UA-12345678-1)</label></p>

        <p>
            <input id="wizard_gaid" type="text" ng-model="gaid">
            <button class="button button-primary" ng-click="set('ga', gaid)">Activate GA</button>
        </p>

        <p>WordPress will then publish the full tracking code into every page of your site.</p>

        <h3>To set up Google Tag Manager</h3>

        <p><label for="wizard_gtmid">Enter your GTM ID below (it looks something like GTM-ABC123)</label></p>

        <p>
            <input id="wizard_gtmid" type="text" ng-model="gtmid">
            <button class="button button-primary" ng-click="set('gtm', gtmid)">Activate GTM</button>
        </p>

        <p>WordPress will publish the GTM code into every page on the site.</p>

        <p>Following this, you will need to go through some more steps to configure your GA account, and your GTM account if you have one.</p>

        <p>More information can be found in the guidance</p>

        <p><a class="button" href="<?php echo esc_url(network_site_url('/analytics-guidance/')) ?>">Read guidance for setting up analytics</a></p>

        <p>This includes:</p>

        <ul class="ul-disc">
            <li>Choosing Google Analytics and Google Tag Manager</li>
            <li>Setting up Google Analytics - properties, views, goals and events</li>
            <li>Setting up Google Tag Manager</li>
            <li>Security considerations</li>
            <li>Reporting</li>
        </ul>
    </div>
</div>
