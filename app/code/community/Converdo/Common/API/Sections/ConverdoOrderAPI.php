<?php

namespace Converdo\Common\API\Sections;

use Converdo\Common\API\ConverdoClient;
use Converdo\Common\API\Models\Contracts\OrderInterface;

class ConverdoOrderAPI
{
    /**
     * Sends a new order to Converdo Analytics.
     *
     * @param  OrderInterface   $order
     * @return bool
     */
    public function create(OrderInterface $order)
    {
        return (new ConverdoClient())
            ->setModule('ConverdoEcommerce.completeOrderCVD')
            ->setParameters([
                'orderId' => $order->getOrderId(),
                'subtotal' => $order->getSubtotal(),
                'tax' => $order->getTax(),
                'shipping' => $order->getShipping(),
                'discount' => $order->getDiscount(),
                'coupon' => $order->getCoupon(),
                'products' => base64_encode(json_encode($order->getProductSKUs())),
                'customer_prefix' => $order->getCustomer('prefix'),
                'customer_name' => $order->getCustomer('name'),
                'customer_address' => $order->getCustomer('address'),
                'customer_postal_code' => $order->getCustomer('postal_code'),
                'customer_city' => $order->getCustomer('city'),
                'customer_country' => $order->getCustomer('country'),
                'customer_email' => $order->getCustomer('email'),
                'customer_telephone' => $order->getCustomer('telephone'),
            ])
            ->post();
    }

    /**
     * Sends the modified order status of an existing order to Converdo Analytics.
     *
     * @param  OrderInterface   $order
     * @return bool
     */
    public function modifyStatus(OrderInterface $order)
    {
        return (new ConverdoClient())
            ->setModule('ConverdoEcommerce.changeOrderStatusCVD')
            ->setParameters([
                'orderId' => $order->getOrderId(),
                'status' => $order->getStatus(),
            ])
            ->post();
    }
}