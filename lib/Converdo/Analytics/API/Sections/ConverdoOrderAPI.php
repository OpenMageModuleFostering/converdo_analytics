<?php

class Converdo_Analytics_API_Sections_ConverdoOrderAPI
{
    public function create(Converdo_Analytics_API_Models_Order $order)
    {
        return (new Converdo_Analytics_API_ConverdoClient())
            ->setModule('ConverdoEcommerce.completeOrderCVD')
            ->setParameters([
                'orderId' => $order->getOrderId(),
                'orderIdUrl' => $order->getOrderIdUrl(),
                'subtotal' => $order->getSubtotal(),
                'tax' => $order->getTax(),
                'shipping' => $order->getShipping(),
                'customer_prefix' => $order->getCustomer('prefix'),
                'customer_name' => $order->getCustomer('name'),
                'customer_address' => $order->getCustomer('address'),
                'customer_postal_code' => $order->getCustomer('postal_code'),
                'customer_city' => $order->getCustomer('city'),
                'customer_country' => $order->getCustomer('country'),
                'customer_email' => $order->getCustomer('email'),
                'customer_telephone' => $order->getCustomer('telephone'),
                'products' => base64_encode(json_encode($order->getProductSkus())),
            ])
            ->post();
    }

    public function modifyStatus(Converdo_Analytics_API_Models_Order $order)
    {
        return (new Converdo_Analytics_API_ConverdoClient())
            ->setModule('ConverdoEcommerce.changeOrderStatusCVD')
            ->setParameters([
                'orderId' => $order->getOrderId(),
                'status' => $order->getStatus(),
            ])
            ->post();
    }
}