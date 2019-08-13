<?php

/**
 * Class Converdo_Tracker_Query_ProductView
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 * @link        https://piwik.org/docs/ecommerce-analytics/
 */
class Converdo_Tracker_Query_ProductView extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'setEcommerceView';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [
            0 => [Converdo_Support_QueryType::string(), $this->entities[0]->getSku()],
            1 => [Converdo_Support_QueryType::string(), addslashes($this->entities[0]->getName())],
            3 => [Converdo_Support_QueryType::float(), number_format($this->entities[0]->getPrice(), 2)],
        ];
    }
}