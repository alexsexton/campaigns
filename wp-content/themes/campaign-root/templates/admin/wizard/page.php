<div class="wrap">
    <h2>Setup Wizard</h2>

    <div ng-app="wizard" ng-controller="Wizard" data-nonce="<?php echo esc_attr(wp_create_nonce('campaigns_wizard')) ?>">

        <div>
            <p ng-repeat="instruction in currentStep().instructions" ng-bind-html="instruction"></p>

            <ul>
                <li ng-repeat="field in currentStep().fields">
                    <div ng-if="field.type === 'text-and-submit'">
                        <input type="text">
                        <button class="button button-secondary" ng-click="field.buttonAction()">
                            {{field.buttonText}}
                        </button>
                    </div>
                </li>
            </ul>

            <ul>
                <li ng-repeat="(action, target) in currentStep().actions">
                    <button class="button button-primary" ng-click="nextStep(target)">{{action}}</button>
                </li>
            </ul>
        </div>

    </div>
</div>
