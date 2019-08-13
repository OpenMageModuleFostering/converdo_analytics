<?php

class Converdo_Analytics_Trackers_Cart extends Converdo_Analytics_Support_AbstractTracker
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
        return Mage::getModel('checkout/cart')->getQuote()->getAllVisibleItems();
    }

    /**
     * Track data for the Request.
     *
     * @return void
     */
    public function track()
    {
        $cart = Mage::getModel('checkout/cart')->getQuote()->getAllVisibleItems();

        foreach ($cart as $cartItem) {
            $product = Mage::getModel('catalog/product')->load($cartItem->product_id);
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
                ->setQuantity($cartItem->getQty());
        }

        Converdo_Analytics_Tracker::ecommerceCartUpdate()
            ->setTotal(Mage::getModel('checkout/cart')->getQuote()->getGrandTotal());
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

        $output = array_merge($output, Converdo_Analytics_Tracker::ecommerceCartUpdate()->toArray());

        return $output;
    }
}