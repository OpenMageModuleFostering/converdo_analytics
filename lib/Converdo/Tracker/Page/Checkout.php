<?php

/**
 * Class Converdo_Tracker_Page_Checkout
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Checkout extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 4;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'checkout_onepage_index' => 400,
            'checkout_onepage_success' => 401,
        ];
    }
}