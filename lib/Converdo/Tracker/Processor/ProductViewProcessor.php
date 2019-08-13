<?php

class Converdo_Tracker_Processor_ProductViewProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Mage_Catalog_Model_Product|Converdo_Entity_Product
     */
    protected $product;

    /**
     * @var array
     */
    protected $categories = [];

    /**
     * Converdo_Tracker_Processor_ProductViewProcessor constructor.
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
        return ($this->product = Mage::registry('current_product')) &&
               ($this->product instanceof Mage_Catalog_Model_Product);
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        $this->product = new Converdo_Entity_Product($this->product);

        $this->writer->make(new Converdo_Tracker_Query_ProductView)->with($this->product)->with([
            2 => implode(', ', $this->categories()),
        ])->write();

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

            // Product Type
            'typ'       => $this->product->getType(),

            // Product Attributes
            'att'       => null,

            // Product Is In Stock
            'stb'       => $this->product->isInStock(),

            // Product Stock Quantity
            'sqn'       => $this->product->getStockQuantity(),
            'cva'       => null,
            'ova'       => null,
            'pco'       => null,
        ]);
    }
}