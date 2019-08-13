<?php

/**
 * Class Converdo_Tracker_Page_Search
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Search extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 8;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'catalogsearch_result_index' => 800,
            'catalogsearch_advanced_index' => 801,
            'catalogsearch_advanced_result' => 802,
            'catalogsearch_term_popular' => 803,
        ];
    }
}