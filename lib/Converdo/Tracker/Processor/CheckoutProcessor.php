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
     * Converdo_Tracker_Processor_CheckoutProcessor constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get whether the processor is responsible for the job.
     *
     * @param Converdo_Analytics_Block_Tracker $block
     * @return bool
     */
    public function responsible(Converdo_Analytics_Block_Tracker $block)
    {
        $this->trackers = $block;
        return (bool) $block->hasOrderedIds();
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        $collection = Mage::getResourceModel('sales/order_collection')
            ->addFieldToFilter('entity_id', array('in' => $this->trackers->getOrderedIds()));

        foreach ($collection as $order) {
            foreach ($order->getAllVisibleItems() as $key => $product) {
                $product    = Mage::getModel('catalog/product')->load($product->product_id);
                $product    = new Converdo_Entity_Product($product);
                $category   = null;

                if (($categoryIds = $product->getCategoryIds()) && count($categoryIds)) {
                    $category = Mage::getModel('catalog/category')->load($categoryIds[0]);
                    $category = $category->getName();
                }

                $this->writer->make(new Converdo_Tracker_Query_EcommerceItem)->with($product)->with([2 => $category])->write();
            }

            $this->writer->make(new Converdo_Tracker_Query_EcommerceTracking())->with([
                0   => $order->getIncrementId(),
                1   => $order->getBaseGrandTotal(),
                2   => number_format($order->getGrandTotal() - $order->getShippingAmount() - $order->getShippingTaxAmount(), 2),
                3   => $order->getBaseTaxAmount(),
                4   => $order->getBaseShippingAmount()
            ])->write();
        }
    }
}