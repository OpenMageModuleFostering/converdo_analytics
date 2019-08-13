<?php

class Converdo_Analytics_Block_Tracker extends Mage_Core_Block_Template
{
    /**
     * @var array
     */
    protected $orderedIds = [];

    /**
     * Render Converdo tracking scripts
     *
     * @return string
     */
    protected function trackers()
    {
        if (! Mage::helper('analytics')->isEnabled()) {
            return null;
        }

        $trackers = [
            new Converdo_Analytics_Trackers_Configuration(),
            new Converdo_Analytics_Trackers_PageView(),
            new Converdo_Analytics_Trackers_SearchView(),
            new Converdo_Analytics_Trackers_EcommerceView(),
            new Converdo_Analytics_Trackers_CategoryView(),
            new Converdo_Analytics_Trackers_Cart(),
            new Converdo_Analytics_Trackers_Order(),
            new Converdo_Analytics_Trackers_Options(),
        ];

        foreach ($trackers as $tracker) {
            if (! $tracker->responsible()) {
                continue;
            }

            $tracker->track();

            Converdo_Analytics_Tracker::attributes($tracker->attributes());
            Converdo_Analytics_Tracker::query($tracker->toArray());
        }

        echo implode("\r\n\t\t\t\t", Converdo_Analytics_Tracker::query());
    }
}
