<?php

/**
 * Class Converdo_Tracker_Page_Category
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Category extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 3;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'catalog_category_view' => 300,
        ];
    }
}