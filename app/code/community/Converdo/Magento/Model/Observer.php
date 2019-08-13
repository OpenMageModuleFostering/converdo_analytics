<?php

require_once dirname(dirname(__DIR__)) . '/Common/bootstrap.php';

use Converdo\Common\API\Factories\OrderFactory;
use Converdo\Common\API\Requests;
use Converdo\Common\Support\ListensToOrders;

class Converdo_Magento_Model_Observer
{
    use ListensToOrders;

    /**
     * Listens to placed orders. Sends the order to the Converdo Analytics API.
     *
     * @param  Varien_Event_Observer        $observer
     * @throws Exception
     */
    public function onOrderPlacedEvent(Varien_Event_Observer $observer)
    {
        if ($this->isDisabled() || $this->hasInvalidOrder($observer)) {
            return;
        }

        try {
            Requests::orderCreate(
                $model = OrderFactory::build($this->order())
            );

            cvd_logger()->info("Order [#{$model->getOrderId()}] was pushed to Converdo Analytics.");
        } catch (Exception $e) {
            cvd_logger()->error($e->getMessage());
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
        if ($this->isDisabled() || $this->hasInvalidOrderOrStatus($observer)) {
            return;
        }

        try {
            Requests::orderStatusUpdate(
                $model = OrderFactory::build($this->order())
            );

            cvd_logger()->info("Order [#{$model->getOrderId()}] status [{$model->getStatus()}] was pushed to Converdo Analytics.");
        } catch (Exception $e) {
            cvd_logger()->error($e->getMessage());
        }        
    }
}
