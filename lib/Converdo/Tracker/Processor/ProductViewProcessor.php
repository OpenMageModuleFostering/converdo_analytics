<?php

class Converdo_Tracker_Processor_ProductViewProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Converdo_Entity_Product
     */
    protected $product;

    /**
     * @var array
     */
    protected $categories = [];

    /**
     * Get whether the processor is responsible for the job.
     *
     * @param Converdo_Analytics_Block_Tracker $block
     * @return bool
     */
    public function responsible(Converdo_Analytics_Block_Tracker $block)
    {
        return Mage::registry('current_product');
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        $this->product = new Converdo_Entity_Product(Mage::registry('current_product'));

        Converdo_Support_QueryParser::entity($this->product);
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_ProductView, [
            2 => [Converdo_Support_QueryType::string(), implode(', ', $this->categories())],
        ]);

        $this->configuration();
    }

    /**
     * Get an array of categories assigned to the product.
     *
     * @return array
     */
    protected function categories()
    {
        if ($this->categories) {
            return $this->categories;
        }

        $categories = [];

        foreach ((array) $this->product->getCategoryIds() as $category)
        {
            $category       = Mage::getModel('catalog/category')->load($category);
            $categories[] 	= addslashes($category->getName());
        }

        return $categories;
    }

    /**
     * Return an encrypted JSON string with configuration.
     *
     * @return array
     */
    protected function configuration()
    {
        $this->setConfiguration([
            // Product Name
            'pti'       => $this->product->getName(),

            // Product Sku
            'sku'       => $this->product->getSku(),

            // Product Price
            'pri'       => $this->product->getPrice(),

            // Product Image
            'ima'       => $this->product->getImageUrl(),

            // Product categories
            'cat'       => implode(', ', $this->categories()),

            // Product Id
            'rid'       => $this->product->getId(),

            // Product Children Id
            'tid'       => $this->children(),

            // Product Type
            'typ'       => $this->product->getType(),

            // Product Attributes
            'att'       => $this->product->getAttributes(),

            // Product Is In Stock
            'stb'       => $this->product->isInStock(),

            // Product Is In Stock
            'bra'       => $this->product->getBrand(),

            // Product Stock Quantity
            'sqn'       => $this->product->getStockQuantity(),
            'cva'       => null,
            'ova'       => null,
            'pco'       => null,
        ]);
    }

    protected function children()
    {
        $children = Mage::getModel('catalog/product_type_configurable')->getChildrenIds($this->product->getId());

        if (! count($children) || ! isset($children[0])) {
            return null;
        }

        return array_keys($children[0]);
    }
}