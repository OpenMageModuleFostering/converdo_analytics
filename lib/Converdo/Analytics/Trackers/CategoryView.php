<?php

class Converdo_Analytics_Trackers_CategoryView extends Converdo_Analytics_Support_AbstractTracker
{
    use Converdo_Analytics_Support_Arrayable,
        Converdo_Analytics_Support_HoldsAttributes;

    /**
     * Determines whether the Tracker is responsible during the Request.
     *
     * @return bool
     */
    public function responsible()
    {
        return Mage::helper('analytics')->isCategoryPage();
    }

    /**
     * Track data for the Request.
     *
     * @return void
     */
    public function track()
    {
        Converdo_Analytics_Tracker::categoryView()
            ->setCategory(Mage::registry('current_category')->getName());
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return Converdo_Analytics_Tracker::categoryView()->toArray();
    }
}