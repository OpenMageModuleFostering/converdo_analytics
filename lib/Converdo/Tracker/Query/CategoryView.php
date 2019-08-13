<?php

/**
 * Class Converdo_Tracker_Query_CategoryView
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 * @link        https://piwik.org/docs/ecommerce-analytics/
 */
class Converdo_Tracker_Query_CategoryView extends Converdo_Tracker_Query_AbstractQuery
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
            0   => [Converdo_Support_QueryType::null()],
            1   => [Converdo_Support_QueryType::null()],
            2   => [Converdo_Support_QueryType::string(), $this->entities[0]->getName()],
        ];
    }
}