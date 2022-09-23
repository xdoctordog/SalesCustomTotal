<?php

namespace DoctorDogg\SalesCustomTotal\Model\Totals;

use Magento\Quote\Model\Quote;
use Magento\Quote\Model\Quote\Address\Total;
use Magento\Quote\Api\Data\ShippingAssignmentInterface;
use Magento\Quote\Model\Quote\Address\Total\AbstractTotal;

class Custom extends AbstractTotal
{
    public function __construct()
    {
        $this->setCode('custom_total');
    }

    public function collect(
        Quote $quote,
        ShippingAssignmentInterface $shippingAssignment,
        Total $total
    ){
        parent::collect($quote, $shippingAssignment, $total);
        $items = $shippingAssignment->getItems();
        if(!count($items)) {
            return $this;
        }

        $amount = 150;
        $total->setTotalAmount('custom_total', $amount);
        $total->setBaseTotalAmount('custom_total', $amount);
        $total->setCustomAmount($amount);
        $total->setBaseCustomAmount($amount);
        $total->setGrandTotal($total->getGrandTotal() + $amount);
        $total->setBaseGrandTotal($total->getGrandTotal() + $amount);
        return $this;
    }

    protected function clearValues(Total $total)
    {
        $total->setTotalAmount('custom_total', 0);
        $total->setBaseTotalAmount('custom_total', 0);
        $total->setTotalAmount('tax', 0);
        $total->setBaseTotalAmount('tax', 0);
        $total->setTotalAmount('discount_tax_compensation', 0);
        $total->setBaseTotalAmount('discount_tax_compensation', 0);
        $total->setTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setSubtotalInclTax('shipping_discount_tax_compensation', 0);
        $total->setBaseSubtotalInclTax('shipping_discount_tax_compensation', 0);
    }

    public function fetch(Quote $quote, Total $total)
    {
        return [
            'code' => $this->getCode(),
            'title' => 'Custom Total',
            'value' => 150,
        ];
    }

    public function getLabel()
    {
        return __('Custom Total');
    }
}
