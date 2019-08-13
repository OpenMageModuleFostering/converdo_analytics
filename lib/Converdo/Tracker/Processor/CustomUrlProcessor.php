<?php

class Converdo_Tracker_Processor_CustomUrlProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * @var Mage_Checkout_Model_Cart
     */
    protected $cart;

    /**
     * @var Converdo_Analytics_Block_Tracker
     */
    protected $trackers;

    /**
     * @inheritdoc
     * @param  Converdo_Analytics_Block_Tracker     $block
     * @return bool
     */
    public function responsible(Converdo_Analytics_Block_Tracker $block)
    {
        return $block->getRequest()->getControllerName() === 'result';
    }

    /**
     * @inheritdoc
     * @return void
     */
    public function process()
    {
        $results = Mage::helper('catalogsearch')->getEngine()
                        ->getResultCollection()
                        ->addSearchFilter(Mage::helper('catalogsearch')
                        ->getQuery()
                        ->getQueryText())
                        ->getSize();

        $current = self::getCurrentUrl();
        $query = self::getQueryString();
        $count = "&search_count={$results}";

        Converdo_Support_QueryParser::add(new Converdo_Tracker_Query_CustomUrl, [
            0 => [Converdo_Support_QueryType::string(), "{$current}?{$query}{$count}"],
        ]);
    }

    /**
     * Returns the current URL without the query string.
     *
     * @return string
     */
    protected static function getCurrentUrl()
    {
        $url = self::parseUrl();

        $url = $url['scheme'] . '://' . $url['host'] . (isset($url['path']) ? $url['path'] : '');

        return $url;
    }

    /**
     * Returns the current query string.
     *
     * @return string
     */
    protected static function getQueryString()
    {
        $url = self::parseUrl();

        return $url['query'];
    }

    protected static function parseUrl()
    {
        $url = Mage::helper('core/url')->getCurrentUrl();

        $url = parse_url($url);

        return $url;
    }
}