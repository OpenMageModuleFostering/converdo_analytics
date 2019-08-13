<?php

class Converdo_Tracker_Processor_HeadProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * Converdo_Tracker_Processor_MetaProcessor constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        $this->writer->make(new Converdo_Tracker_Query_SiteId)->write();
        $this->writer->make(new Converdo_Tracker_Query_TrackerUrl)->write();
    }
}