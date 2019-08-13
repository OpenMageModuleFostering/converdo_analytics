<?php

class Converdo_Analytics_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get whether Converdo Analytics is enabled for this shop.
     *
     * @param null $store
     * @return bool
     */
    public function isEnabled($store = null)
    {
        return (bool) $this->hasSiteId($store)
            && Mage::getStoreConfigFlag('converdo/analytics/active', $store)
            && Mage::getStoreConfigFlag('converdo/analytics/token', $store);
    }

    /**
     * Get the Site Id.
     *
     * @param null $store
     * @return string
     */
    public function getSiteId($store = null)
    {
        return Mage::getStoreConfig('converdo/analytics/site', $store);
    }

    /**
     * Get whether the Site Id is set.
     *
     * @param null $store
     * @return bool
     */
    public function hasSiteId($store = null)
    {
        return (bool) $this->getSiteId($store);
    }

    public function getSiteUrl()
    {
        return '//piwik.converdo.dev/';
    }

    public function getPhpTracker($full = false)
    {
        if ($full) {
            return $this->getSiteUrl() . 'tracker.php';
        }

        return 'tracker.php';
    }

    public function getJsTracker($full = false)
    {
        if ($full) {
            return $this->getSiteUrl() . 'tracker.js';
        }

        return 'tracker.js';
    }
}
