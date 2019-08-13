<?php

abstract class Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Converdo_Support_Writer
     */
    protected $writer;

    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * Converdo_Tracker_Processor_AbstractProcessor constructor.
     */
    public function __construct()
    {
        $this->writer = new Converdo_Support_Writer;
    }

    /**
     * Get whether the processor is responsible for the job.
     *
     * @param Mage_Core_Block_Template $block
     * @return bool
     */
    public function responsible(Mage_Core_Block_Template $block)
    {
        return true;
    }

    /**
     * Return an encrypted JSON string with configuration.
     *
     * @return array
     */
    protected function configuration()
    {
        return [];
    }

    /**
     * Set the configuration.
     *
     * @param $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = (array) $configuration;
    }

    /**
     * Get whether the configuration is set.
     *
     * @return bool
     */
    public function hasConfiguration()
    {
        return (bool) $this->configuration && count($this->configuration);
    }

    /**
     * Get the configuration.
     *
     * @return null|string
     */
    public function getConfiguration()
    {
        if (!($this->hasConfiguration())) {
            return null;
        }

        return (array) $this->configuration;
    }

    /**
     * Process everything.
     *
     * @return void
     */
    abstract public function process();
}