// alert('totals/custom_total.js');
define(
    ['DoctorDogg_SalesCustomTotal/js/view/checkout/summary/custom_total'],
    function (Component) {
        'use strict';
        return Component.extend({
            isDisplayed: function () {
                var result = this.getPureValue() !== 0;
                return result;
            }
        });
    }
);
