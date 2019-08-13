<?php

class Converdo_Tracker_Processor_CartProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Mage_Checkout_Model_Cart
     */
    protected $cart;

    /**
     * @inheritdoc
     * @param  Converdo_Analytics_Block_Tracker         $block
     * @return bool
     */
    public function responsible(Converdo_Analytics_Block_Tracker $block)
    {
        $this->cart = Mage::getModel('checkout/cart');

        return (bool) $this->cart->getQuote()->getAllVisibleItems();
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        foreach ($this->cart->getQuote()->getAllVisibleItems() as $key => $item) {
            $product = Mage::getModel('catalog/product')->load($item->product_id);
            $product = new Converdo_Entity_Product($product);
            $category = null;

            if (($categoryIds = $product->getCategoryIds()) && count($categoryIds)) {
                $category = Mage::getModel('catalog/category')->load($categoryIds[0]);
                $category = $category->getName();
            }

            Converdo_Support_QueryParser::entity($product);
            Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_EcommerceItem, [
                2 => [Converdo_Support_QueryType::string(), $category],
                4 => [Converdo_Support_QueryType::float(), $item->getQty()],
            ]);
        }

        Converdo_Support_QueryParser::entity($this->cart);
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_EcommerceCartUpdate);
    }
}