<?php

interface Converdo_Tracker_Processor_Interface_ProcessorInterface
{
    /**
     * Get whether the processor is responsible for the job.
     *
     * @return bool
     */
    public function responsible();

    /**
     * Process everything.
     *
     * @return void
     */
    public function process();
}