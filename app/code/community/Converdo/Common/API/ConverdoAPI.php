<?php

namespace Converdo\Common\API;

use Converdo\Common\API\Sections\ConverdoOrderAPI;
use Converdo\Common\API\Sections\SetupAPI;

class ConverdoAPI
{
    /**
     * Returns a new ConverdoOrderAPI instance.
     *
     * @return ConverdoOrderAPI
     */
    public static function order()
    {
        return new ConverdoOrderAPI();
    }
    
    /**
     * Returns a new SetupAPI instance.
     *
     * @return SetupAPI
     */
    public static function setup()
    {
        return new SetupAPI();
    }
}