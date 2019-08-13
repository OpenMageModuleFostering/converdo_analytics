<?php

class Converdo_Tracker_Query_PageTracking extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * Get the view.
     *
     * @return mixed
     */
    public function getView()
    {
        return 'trackPageView';
    }
}