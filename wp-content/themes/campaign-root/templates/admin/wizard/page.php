<div class="wrap">
    <h2>Setting up analytics</h2>

    <div ng-app="wizard" ng-controller="Wizard" data-nonce="<?php echo esc_attr(wp_create_nonce('campaigns_wizard')) ?>">

        <p>Here you can set up analytics for your site. You can choose to set up either Google Analytics or Google Tag Manager.</p>

        <p>To set up Google Analytics, enter your GA tracking ID below.</p>

        <input type="text" ng-model="gaid">
        <button class="button button-primary" ng-click="set('ga', gaid)">Activate GA</button>

        <p>To set up Google Tag Manager, enter your GTM ID here.</p>

        <input type="text" ng-model="gtmid">
        <button class="button button-primary" ng-click="set('gtm', gtmid)">Activate GTM</button>

        <h3>Help</h3>

	<p>TODO</p>

    </div>
</div>
