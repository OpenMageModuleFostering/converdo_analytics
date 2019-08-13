<?php

class Converdo_Analytics_Trackers_Configuration extends Converdo_Analytics_Support_AbstractTracker
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
        return true;
    }

    /**
     * Track data for the Request.
     *
     * @return void
     */
    public function track()
    {
        Converdo_Analytics_Tracker::configuration()
            ->setToken(Mage::helper('analytics')->getSiteId());
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return Converdo_Analytics_Tracker::configuration()->toConfigurationArray();
    }
}