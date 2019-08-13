<?php

/**
 * Class Converdo_Tracker_Query_AbstractQuery
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 * @link        https://piwik.org/docs/ecommerce-analytics/
 */
abstract class Converdo_Tracker_Query_AbstractQuery implements Converdo_Tracker_Query_Interface_QueryInterface
{
    /**
     * @var Varien_Object[]
     */
    protected $entities = [];

    /**
     * @inheritdoc
     * @return $this
     */
    public function with(array $entities = [])
    {
        $this->entities = array_merge($this->entities, $entities);

        return $this;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [];
    }
}