//alert('summary/custom_total.js');

define(
    [
        'Magento_Checkout/js/view/summary/abstract-total',
        'Magento_Checkout/js/model/quote',
        'Magento_Catalog/js/price-utils',
        'Magento_Checkout/js/model/totals',
    ],
    function(Component, quote, priceUtils, totals) {
        'use strict';
        return Component.extend({
            defaults: {
                isFullTaxSummaryDisplayed: window.checkoutConfig.isFullTaxSummaryDisplayed || false,
                template: 'DoctorDogg_SalesCustomTotal/checkout/summary/custom_total',
            },
            totals: quote.getTotals(),
            isTaxDisplayedInGrandTotal: window.checkoutConfig.includeTaxInGrandTotal || false,

            isDisplayed: function() {
                var result = this.isFullMode() && this.getPureValue() !== 0;
                alert('summary/custom_total.js::isDisplayed(): ' + result);

                return result;
            },

            getValue: function() {
                var price = 0;
                if (this.totals()) {
                    price = totals.getSegment('custom_total').value;
                }
                // alert('summary/custom_total.js::getValue():' + price);
                return this.getFormattedPrice(price);
            },

            getPureValue: function() {
                var price = 0;
                if (this.totals()) {
                    price = totals.getSegment('custom_total').value;
                }
                // alert('summary/custom_total.js::getPureValue(): ' + price);
                return price;
            },
        });
    }
);
