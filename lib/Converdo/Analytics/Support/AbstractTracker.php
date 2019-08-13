<?php

abstract class Converdo_Analytics_Support_AbstractTracker
{
    /**
     * Determines whether the Tracker is responsible during the Request.
     *
     * @return bool
     */
    public function responsible()
    {
        return false;
    }

    /**
     * Parses the JavaScript using the collected data.
     *
     * @return array
     */
    public function parse()
    {
        return [];
    }

    /**
     * Track data for the Request.
     *
     * @return void
     */
    abstract public function track();
}