<?php

/**
 * Class Converdo_Tracker_Query_PageView
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 */
class Converdo_Tracker_Query_PageView extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'setCustomVariable';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [
            0   => [Converdo_Support_QueryType::integer(), 1],
            1   => [Converdo_Support_QueryType::string(), 'configuration'],
        ];
    }
}