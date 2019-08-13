<?php

/**
 * Class Converdo_Tracker_Page_Homepage
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Homepage extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 6;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'cms_index_index' => 600,
        ];
    }
}