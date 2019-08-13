<?php

/**
 * Class Converdo_Tracker_Query_CustomUrl
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 */
class Converdo_Tracker_Query_CustomUrl extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'setCustomUrl';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [
            
        ];
    }
}