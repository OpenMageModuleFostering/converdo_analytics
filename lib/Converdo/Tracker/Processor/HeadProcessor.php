<?php

class Converdo_Tracker_Processor_HeadProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @inheritdoc
     * @return void
     */
    public function process()
    {
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_SiteId);
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_TrackerUrl);
    }
}