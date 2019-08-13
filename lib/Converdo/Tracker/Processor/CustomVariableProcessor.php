<?php

class Converdo_Tracker_Processor_CustomVariableProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Mage_Catalog_Model_Product|Converdo_Entity_Product
     */
    protected $product;

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
        $this->configuration = $block->configuration;
        return true;
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        $this->writer->make(new Converdo_Tracker_Query_CustomVariable)->with([
            2   => Converdo_Support_Crypt::encrypt(json_encode($this->configuration, true)),
            3   => 'page',
        ])->write();
    }
}