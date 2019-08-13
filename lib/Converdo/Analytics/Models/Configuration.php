<?php

class Converdo_Analytics_Models_Configuration
{
    use Converdo_Analytics_Support_Arrayable;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $linkTracking;

    /**
     * @var string
     */
    protected $pageTracking;

    /**
     * @var string
     */
    protected $heartBeat;

    /**
     * @var null
     */
    protected $ecommerce;

    /**
     * @var null
     */
    protected $view;

    /**
     * Sets the Converdo Analytics Website Token.
     *
     * @param  string           $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = (string) $token;

        return $this;
    }

    /**
     * Retrieves the Converdo Analytics Website Token.
     *
     * @return string
     */
    public function getToken()
    {
        return (string) $this->token;
    }

    /**
     * Gets whether the Converdo Analytics Website Token is set.
     *
     * @return bool
     */
    public function hasToken()
    {
        return (bool) $this->token;
    }

    /**
     * Enables the tracking of links.
     *
     * @param  bool         $status
     * @return $this
     */
    public function enableLinkTracking($status)
    {
        $this->linkTracking = (bool) $status;

        return $this;
    }

    /**
     * Gets whether the tracking of links is enabled.
     *
     * @return bool
     */
    public function hasLinkTrackingEnabled()
    {
        return (bool) $this->linkTracking;
    }

    /**
     * Enables the tracking of pages.
     *
     * @param  bool         $status
     * @return $this
     */
    public function enablePageTracking($status)
    {
        $this->pageTracking = (bool) $status;

        return $this;
    }

    /**
     * Gets whether the tracking of pages is enabled.
     *
     * @return bool
     */
    public function hasPageTrackingEnabled()
    {
        return (bool) $this->pageTracking;
    }

    /**
     * Enables HeartBeat.
     *
     * @param  bool         $status
     * @return $this
     */
    public function enableHeartBeat($status)
    {
        $this->heartBeat = (bool) $status;

        return $this;
    }

    /**
     * Gets whether the HeartBeat is enabled.
     *
     * @return bool
     */
    public function hasHeartBeatEnabled()
    {
        return (bool) $this->heartBeat;
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toConfigurationArray()
    {
        return [
            "_paq.push(['setSiteId', '" . $this->getToken() . "']);",
            "_paq.push(['setTrackerUrl', '" . Mage::helper('analytics')->getPhpTracker(true) . "']);",
        ];
    }

    public function toOptionsArray()
    {
        $output = [];

        if ($this->hasPageTrackingEnabled() && ! Mage::helper('analytics')->isSearchPage()) {
            $output[] = "_paq.push(['trackPageView']);";
        }

        if ($this->hasLinkTrackingEnabled()) {
            $output[] = "_paq.push(['enableLinkTracking']);";
        }

        if ($this->hasHeartBeatEnabled()) {
            $output[] = "_paq.push(['enableHeartBeatTimer']);";
        }

        return $output;
    }
}