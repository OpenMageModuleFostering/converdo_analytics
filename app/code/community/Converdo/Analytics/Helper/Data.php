<?php

class Converdo_Analytics_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get whether Converdo Analytics is enabled for this shop.
     *
     * @param null $store
     * @return bool
     */
    public static function isEnabled($store = null)
    {
        return (bool) self::hasSiteId($store)
            && Mage::getStoreConfigFlag('converdo/analytics/active', $store)
            && Mage::getStoreConfigFlag('converdo/analytics/token', $store);
    }

    /**
     * Get the Site Id.
     *
     * @param null $store
     * @return string
     */
    public static function getSiteId($store = null)
    {
        return Mage::getStoreConfig('converdo/analytics/site', $store);
    }

    /**
     * Get whether the Site Id is set.
     *
     * @param null $store
     * @return bool
     */
    public static function hasSiteId($store = null)
    {
        return (bool) self::getSiteId($store);
    }

    public static function getSiteUrl()
    {
        return '//tracker.converdo.com/';
    }

    public static function getPhpTracker($full = false)
    {
        if ($full) {
            return self::getSiteUrl() . 'tracker.php';
        }

        return 'tracker.php';
    }

    public static function getJsTracker($full = false)
    {
        if ($full) {
            return self::getSiteUrl() . 'tracker.js';
        }

        return 'tracker.js';
    }

    public function isSearchPage()
    {
        return isset(Converdo_Analytics_Tracker::attributes()['pt2'])
            && Converdo_Analytics_Tracker::attributes()['pt2'] === 'search_results';
    }

    public function isSuccessPage()
    {
        return isset(Converdo_Analytics_Tracker::attributes()['pt2'])
            && Converdo_Analytics_Tracker::attributes()['pt2'] === 'success_index';
    }
}
