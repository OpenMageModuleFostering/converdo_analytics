<?php

class Converdo_Analytics_Model_Observer
{
    /**
     * Listens to placed orders. Sends the order to the Converdo Analytics API.
     *
     * @param  Varien_Event_Observer        $observer
     * @throws Exception
     */
    public function onOrderPlacedEvent(Varien_Event_Observer $observer)
    {
        try {
            $order = $this->getOrder($observer);

            if (! $this->enabled() || ! $order) {
                return;
            }

            (new Converdo_Analytics_API_ConverdoAPI())->order()->create(
                (new Converdo_Analytics_API_Factories_Order())->make($order)
            );

            Converdo_Analytics_Cookie_Manager::logEcommerce();
        } catch (Exception $e) {
            Converdo_Analytics_Model_Logger::info($e->getMessage());
        }
    }

    /**
     * Listens to changed orders. Sends the new order status to the Converdo Analytics API.
     *
     * @param  Varien_Event_Observer        $observer
     * @throws Exception
     */
    public function onOrderStatusChangedEvent(Varien_Event_Observer $observer)
    {
        try {
            $order = $this->getOrder($observer);

            if (! $this->enabled() || ! $order) {
                return;
            }

            (new Converdo_Analytics_API_ConverdoAPI())->order()->modifyStatus(
                (new Converdo_Analytics_API_Factories_Order())->make($order)
            );
        } catch (Exception $e) {
            Converdo_Analytics_Model_Logger::info($e->getMessage());
        }
    }

    /**
     * Checks whether the Converdo Analytics plugin is enabled.
     *
     * @return bool
     */
    protected function enabled()
    {
        return Mage::helper('analytics')->isEnabled();
    }

    /**
     * Retrieves the Magento order from the event.
     *
     * @param  Varien_Event_Observer        $observer
     * @return Mage_Sales_Model_Order
     */
    protected function getOrder(Varien_Event_Observer $observer)
    {
        return $observer->getEvent()->getOrder();
    }
}
