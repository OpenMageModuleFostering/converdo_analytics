<?php

/**
 * Class Converdo_Tracker_Query_TrackerUrl
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 */
class Converdo_Tracker_Query_TrackerUrl extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'setTrackerUrl';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [
            0   => [Converdo_Support_QueryType::string(), Converdo_Analytics_Helper_Data::getPhpTracker(true)],
        ];
    }
}