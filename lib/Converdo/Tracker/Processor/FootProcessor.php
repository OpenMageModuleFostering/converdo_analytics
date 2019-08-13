<?php

class Converdo_Tracker_Processor_FootProcessor extends Converdo_Tracker_Processor_AbstractProcessor
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
        $this->writer->make(new Converdo_Tracker_Query_PageTracking)->write();
        $this->writer->make(new Converdo_Tracker_Query_LinkTracking)->write();
        $this->writer->make(new Converdo_Tracker_Query_HeartBeat)->write();
    }
}