<?php

namespace Converdo\Magento\API\Factories;

use Converdo\Common\API\Models\Contracts\OrderInterface;
use Converdo\Common\API\Models\Order;
use Mage_Sales_Model_Order;

class OrderFactory
{
    /**
     * @param  Mage_Sales_Model_Order       $order
     * @return OrderInterface
     */
    public static function build(Mage_Sales_Model_Order $order)
    {
        return (new Order())
                    ->setOrderId($order->getRealOrderId())
                    ->setCustomer(self::customer($order))
                    ->setProducts(cvd_config()->platform()->getActiveCartProducts())
                    ->setSubtotal($order->getSubtotal())
                    ->setTax($order->getBaseTaxAmount())
                    ->setShipping($order->getBaseShippingAmount())
                    ->setDiscount($order->getBaseDiscountAmount())
                    ->setCoupon($order->getCouponCode())
                    ->setStatus($order->getStatus());
    }

    /**
     * Returns all associated customer data.
     *
     * @param  Mage_Sales_Model_Order       $order
     * @return array
     */
    protected static function customer(Mage_Sales_Model_Order $order)
    {
        return [
            'prefix' => $order->getBillingAddress()->getPrefix(),
            'name' => $order->getBillingAddress()->getName(),
            'address' => implode(', ', $order->getBillingAddress()->getStreet()),
            'postal_code' => $order->getBillingAddress()->getPostcode(),
            'city' => $order->getBillingAddress()->getCity(),
            'country' => $order->getBillingAddress()->getCountryModel()->getName(),
            'email' => $order->getBillingAddress()->getEmail() ?: $order->getCustomerEmail(),
            'telephone' => $order->getBillingAddress()->getTelephone(),
        ];
    }
}