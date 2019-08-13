<?php

class Converdo_Tracker_Processor_CategoryViewProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Mage_Catalog_Model_Category
     */
    protected $category;

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
     * @param Mage_Core_Block_Template $block
     * @return bool
     */
    public function responsible(Mage_Core_Block_Template $block)
    {
        $this->category = Mage::registry('current_category');
        return Mage::app()->getFrontController()->getAction()->getFullActionName() == 'catalog_category_view';
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        $this->writer->make(new Converdo_Tracker_Query_CategoryView)->with($this->category)->write();
    }
}