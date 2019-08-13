<?php

/**
 * Class Converdo_Tracker_Page_AbstractPage
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
abstract class Converdo_Tracker_Page_AbstractPage
{
    /**
     * Returns the key representing the Page Type.
     *
     * @return int
     */
    public function type()
    {
        return 0;
    }

    /**
     * Returns an array with mapped Page Subtypes.
     *
     * @return array
     */
    public function types()
    {
        return [];
    }
}