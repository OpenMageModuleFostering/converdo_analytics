<?php

class Converdo_Tracker_Processor_FootProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @inheritdoc
     * @return void
     */
    public function process()
    {
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_PageTracking);
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_LinkTracking);
        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_HeartBeat);
    }
}