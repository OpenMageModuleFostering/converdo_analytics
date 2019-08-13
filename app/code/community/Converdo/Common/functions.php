<?php

if (! function_exists('cvd_app')) {
    /**
     * Get the available container instance.
     *
     * @param  string       $abstract
     * @return mixed
     */
    function cvd_app($abstract = null)
    {
        if ($abstract) {
            return cvd_app()->make($abstract);
        }

        return \Converdo\Common\Container\Container::instance();
    }
}

if (! function_exists('cvd_logger'))
{
    /**
     * Returns the Logger instance.
     *
     * @return \Converdo\Common\Log\Logger::class
     */
    function cvd_logger()
    {
        return cvd_app(\Converdo\Common\Log\Logger::class);
    }
}

if (! function_exists('cvd_config'))
{
    /**
     * Returns the Configuration instance.
     *
     * @return \Converdo\Common\Config\Configuration
     */
    function cvd_config()
    {
        return cvd_app(\Converdo\Common\Config\Configuration::class);
    }
}