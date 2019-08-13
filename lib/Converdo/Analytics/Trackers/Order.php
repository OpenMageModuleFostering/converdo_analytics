<?php

class Converdo_Analytics_Trackers_Order extends Converdo_Analytics_Support_AbstractTracker
{
    use Converdo_Analytics_Support_Arrayable,
        Converdo_Analytics_Support_HoldsAttributes;

    protected $products = [];

    /**
     * Determines whether the Tracker is responsible during the Request.
     *
     * @return bool
     */
    public function responsible()
    {
        return Mage::helper('analytics')->isSuccessPage();
    }

    /**
     * Track data for the Request.
     *
     * @return void
     */
    public function track()
    {
        $quoteId = Mage::getSingleton('checkout/session')->getLastQuoteId();

        if (! $quoteId) {
            return;
        }

        $order = Mage::getModel('sales/order')->loadByAttribute('quote_id', $quoteId);

        foreach ($order->getAllItems() as $orderProduct) {
            $product = Mage::getModel('catalog/product')->load($orderProduct->product_id);
            $category = false;

            if (count($product->getCategoryIds())) {
                $category = Mage::getModel('catalog/category')->load($product->getCategoryIds()[0]);
                $category = $category->getName();
            }

            $this->products[] = Converdo_Analytics_Tracker::ecommerceProduct()
                ->setSku($product->getSku())
                ->setName($product->getName())
                ->setCategory($category)
                ->setPrice($product->getFinalPrice())
                ->setQuantity($orderProduct->getQty());
        }

        Converdo_Analytics_Tracker::ecommerceOrder()
            ->setOrderId($order->getIncrementId())
            ->setTotal($order->getBaseGrandTotal())
            ->setSubtotal($order->getGrandTotal() - $order->getShippingAmount() - $order->getShippingTaxAmount())
            ->setTax($order->getBaseTaxAmount())
            ->setShipping($order->getBaseShippingAmount());
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $output = [];

        foreach ($this->products as $product) {
            $output = array_merge($product->toArray(), $output);
        }

        $output = array_merge($output, Converdo_Analytics_Tracker::ecommerceOrder()->toArray());

        return $output;
    }
}