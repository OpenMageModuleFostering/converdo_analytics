<?php

class Converdo_Analytics_API_ConverdoClient
{
    /**
     * @var string
     */
    protected $module;

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @var int
     */
    protected $limit = 10000;

    /**
     * Set Module.
     *
     * @param  string   $module
     * @return $this
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get Module.
     *
     * @return mixed
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set Parameters.
     *
     * @param  array    $parameters
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters + $this->defaultParameters();

        return $this;
    }

    /**
     * Appends the default parameters needed for each request.
     *
     * @return array
     */
    public function defaultParameters()
    {
        $cookie = Converdo_Analytics_Cookie_Manager::find();

        return [
            'visitor' => $cookie->getVisitor(),
        ];
    }

    /**
     * Get Parameters.
     *
     * @return array
     */
    public function getParameters()
    {
        return (array) $this->parameters;
    }

    /**
     * Set Limit.
     *
     * @param  int      $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Get Limit.
     *
     * @return int
     */
    public function getLimit()
    {
        return (int) $this->limit;
    }

    protected function buildUrl()
    {
        $siteId = Mage::getStoreConfig('converdo/analytics/site');
        $userId = Mage::getStoreConfig('converdo/analytics/token');

        return Mage::helper('analytics')->getSiteUrl() .
                "index.php?module=API" .
                "&method={$this->module}" .
                "&idSite={$siteId}" .
                "&token_auth={$userId}" .
                "&format=json";
    }

    public function post()
    {
        try {
            $ch = curl_init($this->buildUrl());

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getParameters());
            curl_exec($ch);

            curl_close($ch);
        } catch (\Exception $e) {
            // Whoops...
        }

        return true;
    }
}