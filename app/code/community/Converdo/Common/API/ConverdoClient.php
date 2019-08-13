<?php

namespace Converdo\Common\API;

use Converdo\Common\Cookie\Managers\CookieManager;
use Exception;

class ConverdoClient
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
    public function setParameters(array $parameters = [])
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
        $cookie = CookieManager::find();

        return $cookie ? ['visitor' => $cookie->getVisitor()] : [];
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

    /**
     * Builds the URL for the request.
     *
     * @param  string       $method
     * @return string
     */
    protected function buildUrl($method = 'GET')
    {
        $parameters = [
            'module' => 'API',
            'method' => $this->module,
            'idSite' => cvd_config()->platform()->website(),
            'token_auth' => cvd_config()->platform()->user(),
            'format' => 'json',
        ];

        if ($method === 'GET') {
            $parameters = $parameters + $this->getParameters();
        }

        return cvd_config()->protocol() . ':' . cvd_config()->url(
            "index.php?" .
            http_build_query($parameters)
        );
    }

    /**
     * Posts the data to the API.
     *
     * @throws Exception
     * @return string
     */
    public function post()
    {
        return $this->request('POST');
    }

    /**
     * Gets the data from the API.
     *
     * @throws Exception
     * @return string
     */
    public function get()
    {
        return $this->request('GET');
    }

    /**
     * Makes the request to the server.
     *
     * @param  string       $method
     * @return string
     * @throws Exception
     */
    public function request($method = 'GET')
    {
        $ch = curl_init($this->buildUrl($method));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/resources/api_cert_chain.pem');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getParameters());
        }
		
        $response = curl_exec($ch);

        if ($response === FALSE) {
            throw new Exception(curl_error($ch));
        }

        curl_close($ch);

        return trim((string) $response);
    }
}