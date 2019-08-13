<?php

interface Converdo_Tracker_Processor_Interface_ProcessorInterface
{
    /**
     * Gets whether the processor is responsible for the job.
     *
     * @param  Converdo_Analytics_Block_Tracker     $block
     * @return bool
     */
    public function responsible(Converdo_Analytics_Block_Tracker $block);

    /**
     * Processes everything.
     *
     * @return void
     */
    public function process();
}