<?php

class Converdo_Tracker_Processor_CategoryViewProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @inheritdoc
     * @param  Mage_Core_Block_Template     $block
     * @return bool
     */
    public function responsible(Mage_Core_Block_Template $block)
    {
        return Mage::registry('current_category');
    }

    /**
     * @inheritdoc
     * @return void
     */
    public function process()
    {
        $category = Mage::registry('current_category');

        Converdo_Support_QueryParser::entity($category);
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_CategoryView);
    }
}