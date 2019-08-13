<?php

class Converdo_Analytics_Trackers_Options extends Converdo_Analytics_Support_AbstractTracker
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
            ->enablePageTracking(true)
            ->enableLinkTracking(true)
            ->enableHeartBeat(true);
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge(
            Converdo_Analytics_Tracker::pageView()->toArray(),
            Converdo_Analytics_Tracker::configuration()->toOptionsArray()
        );
    }
}