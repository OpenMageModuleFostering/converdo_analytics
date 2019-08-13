<?php

/**
 * Class Converdo_Tracker_Query_SiteId
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 */
class Converdo_Tracker_Query_SiteId extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'setSiteId';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [
            0   => [Converdo_Support_QueryType::string(), Converdo_Analytics_Helper_Data::getSiteId()],
        ];
    }
}