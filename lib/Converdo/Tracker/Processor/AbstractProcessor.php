<?php

/**
 * Class Converdo_Tracker_Processor_AbstractProcessor
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
abstract class Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * Returns an encrypted JSON string with configuration.
     *
     * @return array
     */
    protected function configuration()
    {
        return [];
    }

    /**
     * Sets the configuration.
     *
     * @param  array|string     $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = (array) $configuration;
    }

    /**
     * Gets the configuration.
     *
     * @return null|string
     */
    public function getConfiguration()
    {
        if (! $this->hasConfiguration()) {
            return null;
        }

        return (array) $this->configuration;
    }

    /**
     * Gets whether the configuration is set and has data.
     *
     * @return bool
     */
    public function hasConfiguration()
    {
        return (bool) $this->configuration && count($this->configuration);
    }

    /**
     * @inheritdoc
     * @param  Converdo_Analytics_Block_Tracker     $block
     * @return bool
     */
    public function responsible(Converdo_Analytics_Block_Tracker $block)
    {
        return true;
    }

    /**
     * @inheritdoc
     * @return void
     */
    abstract public function process();
}