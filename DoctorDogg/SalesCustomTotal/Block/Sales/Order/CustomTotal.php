<?php

namespace DoctorDogg\SalesCustomTotal\Block\Sales\Order;

use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\DataObject;

class CustomTotal extends AbstractBlock
{
    public function initTotals()
    {
        $orderTotalsBlock = $this->getParentBlock();
        $order = $orderTotalsBlock->getOrder();
        if($order->getCustomAmount() > 0) {
            $orderTotalsBlock->addTotal(new DataObject([
                'code' => 'custom_total',
                'label' => __('Custom Total'),
                'value' => $order->getCustomAmount(),
                'base_value' => $order->getCustomBaseAmount(),
            ]), 'subtotal');
        }
    }
}
