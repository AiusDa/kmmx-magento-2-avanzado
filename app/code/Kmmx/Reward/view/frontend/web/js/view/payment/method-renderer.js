define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'reward',
                component: 'Kmmx_Reward/js/view/payment/method-renderer/reward'
            }
        );
        return Component.extend({});
    }
);
