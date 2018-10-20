define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Kmmx_Reward/js/model/reward-validation'
    ],
    function (Component, additionalValidators, rewardValidator) {
        'use strict';
        additionalValidators.registerValidator(rewardValidator);
        return Component.extend({});
    }
);
