<?php

namespace Converdo\Common\API;

use Converdo\Common\API\Models\Contracts\OrderInterface;
use Converdo\Common\Cookie\Managers\CookieManager;

class Requests
{
    /**
     * Sends the order to Converdo Analytics.
     *
     * @param  OrderInterface       $order
     * @return bool
     */
    public static function orderCreate(OrderInterface $order)
    {
        cvd_logger()->info("Order [#{$order->getOrderId()}] was created in the webshop.");

        (new ConverdoAPI())->order()->create($order);

        CookieManager::logEcommerce();

        return true;
    }

    /**
     * Sends an updated status to Converdo Analytics.
     *
     * @param  OrderInterface       $order
     * @return bool
     */
    public static function orderStatusUpdate(OrderInterface $order)
    {
        cvd_logger()->info("Order [#{$order->getOrderId()}] status changed to [{$order->getStatus()}] in the webshop.");

        (new ConverdoAPI())->order()->modifyStatus($order);

        return true;
    }

    /**
     * Retrieves the website configuration.
     *
     * @return string
     */
    public static function configuration()
    {
        return (new ConverdoAPI())->setup()->configuration();
    }
}