<?php

/**
 * Class Converdo_Tracker_Page_Product
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Product extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 7;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'catalog_product_view' => 700,
        ];
    }
}