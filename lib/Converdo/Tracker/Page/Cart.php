<?php

/**
 * Class Converdo_Tracker_Page_Cart
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Cart extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 2;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'checkout_cart_index' => 200,
        ];
    }
}