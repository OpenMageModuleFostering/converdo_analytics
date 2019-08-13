<?php

class Converdo_Analytics_Trackers_EcommerceView extends Converdo_Analytics_Support_AbstractTracker
{
    use Converdo_Analytics_Support_Arrayable,
        Converdo_Analytics_Support_HoldsAttributes;

    /**
     * Determines whether the Tracker is responsible during the Request.
     *
     * @return bool
     */
    public function responsible()
    {
        return Mage::registry('current_product')
            && Mage::registry('current_product') instanceof Mage_Catalog_Model_Product
            && Mage::app()->getFrontController()->getRequest()->getRouteName() !== 'catalogsearch';
    }

    /**
     * Track data for the Request.
     *
     * @return void
     */
    public function track()
    {
        Converdo_Analytics_Tracker::ecommerceView()
            ->setSku(Mage::registry('current_product')->getSku())
            ->setName(Mage::registry('current_product')->getName())
            ->setCategories(Mage::registry('current_product')->getCategoryIds())
            ->setPrice(Mage::registry('current_product')->getFinalPrice())
            ->setImageUrl(Mage::registry('current_product')->getImageUrl())
            ->setId(Mage::registry('current_product')->getId())
            ->setType(Mage::registry('current_product')->getTypeID())
            ->setIsInStock(Mage::registry('current_product')->getStockItem()->getIsInStock())
            ->setStockQuantity(Mage::registry('current_product')->getStockItem()->getQty())
        ;
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return Converdo_Analytics_Tracker::ecommerceView()->toArray();
    }

    /**
     * Adds attributes to the stack.
     *
     * @return array
     */
    public function attributes()
    {
        return Converdo_Analytics_Tracker::ecommerceView()->attributes();
    }
}