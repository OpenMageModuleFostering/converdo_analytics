<?php

namespace Converdo\Common\Support;

use Mage_Sales_Model_Order;
use Varien_Event_Observer;

trait ListensToOrders
{
    /**
     * @var Mage_Sales_Model_Order
     */
    protected $order;

    /**
     * Gets whether the plugin is disabled and should stop listening to the orders.
     *
     * @return bool
     */
    protected function isDisabled()
    {
        return cvd_config()->platform()->disabled();
    }

    /**
     * Gets whether the order is invalid or empty and should stop listening to the orders.
     *
     * @param  Varien_Event_Observer    $observer
     * @return bool
     */
    protected function hasInvalidOrder(Varien_Event_Observer $observer)
    {
        $this->order = $observer->getEvent()->getOrder();

        return ! $this->order;
    }

    /**
     * Gets whether the order status is invalid or empty and should stop listening to the orders.
     *
     * @param  Varien_Event_Observer    $observer
     * @return bool
     */
    protected function hasInvalidOrderOrStatus(Varien_Event_Observer $observer)
    {
        $this->order = $observer->getEvent()->getOrder();

        return ! $this->order || ! $this->order->getStatus();
    }

    /**
     * Gets the order.
     *
     * @return Mage_Sales_Model_Order
     */
    public function order()
    {
        return $this->order;
    }
}