<?php

/**
 * Class Converdo_Tracker_Page_Contact
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Contact extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 5;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'contacts' => 500,
        ];
    }
}