<?php

class Converdo_Analytics_API_Factories_Order
{
    /**
     * @var Mage_Sales_Model_Order
     */
    protected $order;

    /**
     * @var Converdo_Analytics_API_Models_Order
     */
    protected $model;

    /**
     * @param  Mage_Sales_Model_Order       $order
     * @return Converdo_Analytics_API_Models_Order
     */
    public function make(Mage_Sales_Model_Order $order)
    {
        $this->order = $order;
        $this->model = (new Converdo_Analytics_API_Models_Order())
            ->setOrderId($order->getRealOrderId())
            ->setCustomer($this->customer())
            ->setProducts($this->products())
            ->setSubtotal($order->getSubtotal())
            ->setTax($order->getBaseTaxAmount())
            ->setShipping($order->getBaseShippingAmount())
            ->setStatus($order->getState())
        ;
        
        return $this->model;
    }

    /**
     * Retrieve all customer data.
     *
     * @return array
     */
    protected function customer()
    {
        $billing = $this->order->getBillingAddress();

        return [
            'prefix' => $billing->getPrefix(),
            'name' => $billing->getName(),
            'address' => $billing->getStreet(-1),
            'postal_code' => $billing->getPostcode(),
            'city' => $billing->getCity(),
            'country' => $billing->getCountryModel()->getName(),
            'email' => $billing->getEmail() ?: $this->order->getCustomerEmail(),
            'telephone' => $billing->getTelephone(),
        ];
    }

    /**
     * Retrieve all (parent) products in the cart.
     *
     * @return array
     */
    protected function products()
    {
        $products = [];

        foreach (Mage::getModel('checkout/cart')->getQuote()->getAllVisibleItems() as $item) {
            if ($item->getPrice() < 0.01) {
                continue;
            }

            $product = Mage::getModel('catalog/product')->load($item->product_id);

            $products[] = [
                'name' => $product->getName(),
                'sku' => $product->getSku(),
                'price' => $item->getPrice(),
                'quantity' => $item->getQtyOrdered(),
            ];
        }

        return $products;
    }
}
