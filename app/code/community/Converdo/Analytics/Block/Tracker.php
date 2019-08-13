<?php

class Converdo_Analytics_Block_Tracker extends Mage_Core_Block_Template
{
    /**
     * @var array
     */
    protected $orderedIds = [];

    /**
     * @var array
     */
    public $configuration = [];

    /**
     * Render Converdo tracking scripts
     *
     * @return string
     */
    protected function trackers()
    {
        if (!Mage::helper('analytics')->isEnabled()) {
            return null;
        }

        foreach (Mage::getModel('checkout/cart')->getQuote()->getAllVisibleItems() as $productId) {
            $this->addOrderedId($productId->getProductId());
        }

        $processors[] = new Converdo_Tracker_Processor_HeadProcessor;
        $processors[] = new Converdo_Tracker_Processor_CartProcessor;
        $processors[] = new Converdo_Tracker_Processor_CheckoutProcessor;
        $processors[] = new Converdo_Tracker_Processor_ProductViewProcessor;
        $processors[] = new Converdo_Tracker_Processor_CustomUrlProcessor;
        $processors[] = new Converdo_Tracker_Processor_CategoryViewProcessor;
        $processors[] = new Converdo_Tracker_Processor_PageViewProcessor;
        $processors[] = new Converdo_Tracker_Processor_FootProcessor;

        foreach ($processors as $key => $processor) {
            if (!($processor->responsible($this))) {
                continue;
            }

            $processor->process($this);
            
            if ($processor->hasConfiguration()) {
                $this->configuration = array_merge($this->configuration, $processor->getConfiguration());
            }

            if ($key === count($processors) - 2) {
                $customVariables = new Converdo_Tracker_Processor_CustomVariableProcessor;
                $customVariables->responsible($this);
                $customVariables->process();
            }
        }
        
        echo Converdo_Support_QueryParser::parse();
    }

    /**
     * Set the ordered ids.
     *
     * @param array $orderedIds
     */
    public function setOrderedIds(array $orderedIds = [])
    {
        $this->orderedIds = $orderedIds;
    }

    /**
     * Add an order id.
     *
     * @param array $id
     */
    public function addOrderedId($id)
    {
        $this->orderedIds[] = $id;
    }

    /**
     * Get the ordered ids.
     *
     * @return array
     */
    public function getOrderedIds()
    {
        return (array) $this->orderedIds;
    }

    /**
     * Get whether the ordered ids are set.
     *
     * @return bool
     */
    public function hasOrderedIds()
    {
        return (bool) is_array($this->orderedIds) && count($this->orderedIds);
    }
}
