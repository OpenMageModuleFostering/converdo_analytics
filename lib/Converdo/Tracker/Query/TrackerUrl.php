<?php

class Converdo_Tracker_Query_TrackerUrl extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @var Converdo_Analytics_Helper_Data
     */
    protected $helper;

    /**
     * Converdo_Tracker_Query_TrackerUrl constructor.
     */
    public function __construct()
    {
        $this->helper = new Converdo_Analytics_Helper_Data;
    }

    /**
     * Get the view.
     *
     * @return mixed
     */
    public function getView()
    {
        return 'setTrackerUrl';
    }

    /**
     * Get the data.
     *
     * @return array
     */
    public function getData()
    {
        return [
            0 => $this->helper->getPhpTracker(true),
        ];
    }
}