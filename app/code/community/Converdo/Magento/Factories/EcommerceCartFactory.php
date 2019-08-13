<?php

namespace Converdo\Magento\Factories;

use Converdo\Common\Query\Models\Contracts\EcommerceCartInterface;
use Converdo\Common\Query\Models\EcommerceCart;
use Mage_Checkout_Model_Cart;

class EcommerceCartFactory
{
    /**
     * @param  Mage_Checkout_Model_Cart     $cart
     * @return EcommerceCartInterface
     */
    public static function build(Mage_Checkout_Model_Cart $cart)
    {
        return (new EcommerceCart())
                    ->setSubtotal($cart->getQuote()->getSubtotal())
                    ->setTotal($cart->getQuote()->getGrandTotal());
    }
}