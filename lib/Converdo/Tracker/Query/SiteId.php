<?php

class Converdo_Tracker_Query_SiteId extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * Get the view.
     *
     * @return mixed
     */
    public function getView()
    {
        return 'setSiteId';
    }

    /**
     * Get the data.
     *
     * @return array
     */
    public function getData()
    {
        return [
            0   => Mage::helper('analytics')->getSiteId(),
        ];
    }
}