<?php

/**
 * Class Converdo_Tracker_Query_EcommerceCartUpdate
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 * @link        https://piwik.org/docs/ecommerce-analytics/
 */
class Converdo_Tracker_Query_EcommerceCartUpdate extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'trackEcommerceCartUpdate';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [
            0 => [Converdo_Support_QueryType::float(), number_format($this->entities[0]->getQuote()->getGrandTotal(), 2, ',', '.')],
        ];
    }
}