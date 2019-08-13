<?php

class Converdo_Tracker_Processor_CheckoutProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Mage_Checkout_Model_Cart
     */
    protected $cart;

    /**
     * @var Converdo_Analytics_Block_Tracker
     */
    protected $trackers;

    /**
     * @inheritdoc
     * @param  Converdo_Analytics_Block_Tracker     $block
     * @return bool
     */
    public function responsible(Converdo_Analytics_Block_Tracker $block)
    {
        $this->trackers = $block;

        return $block->hasOrderedIds();
    }

    /**
     * @inheritdoc
     * @return void
     */
    public function process()
    {
        $collection = Mage::getResourceModel('sales/order_collection')
            ->addFieldToFilter('entity_id', array('in' => $this->trackers->getOrderedIds()));

        foreach ($collection as $order) {
            foreach ($order->getAllVisibleItems() as $key => $product) {
                $product = Mage::getModel('catalog/product')->load($product->product_id);
                $product = new Converdo_Entity_Product($product);
                $category = "";

                if (($categoryIds = $product->getCategoryIds()) && count($categoryIds)) {
                    $category = Mage::getModel('catalog/category')->load($categoryIds[0]);
                    $category = $category->getName();
                }

                Converdo_Support_QueryParser::entity($product);
                Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_EcommerceItem, [
                    2 => [Converdo_Support_QueryType::string(), $category],
                ]);
            }

            foreach ($collection as $finalOrder) {
                Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_EcommerceTracking, [
                    0 => [Converdo_Support_QueryType::integer(), $finalOrder->getIncrementId()],
                    1 => [Converdo_Support_QueryType::float(), $finalOrder->getBaseGrandTotal()],
                    2 => [Converdo_Support_QueryType::float(), number_format($finalOrder->getGrandTotal() - $finalOrder->getShippingAmount() - $finalOrder->getShippingTaxAmount(), 2)],
                    3 => [Converdo_Support_QueryType::float(), $finalOrder->getBaseTaxAmount()],
                    4 => [Converdo_Support_QueryType::float(), $finalOrder->getBaseShippingAmount()],
                ]);
            }
        }
    }
}