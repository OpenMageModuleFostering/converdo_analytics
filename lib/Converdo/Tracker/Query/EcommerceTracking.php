<?php

/**
 * Class Converdo_Tracker_Query_EcommerceTracking
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 * @link        https://piwik.org/docs/ecommerce-analytics/
 */
class Converdo_Tracker_Query_EcommerceTracking extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'trackEcommerceOrder';
    }
}