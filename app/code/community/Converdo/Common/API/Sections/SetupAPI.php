<?php

namespace Converdo\Common\API\Sections;

use Converdo\Common\API\ConverdoClient;

class SetupAPI
{
    /**
     * Retrieve the website configuration.
     *
     * @return bool
     */
    public function configuration()
    {
        return (new ConverdoClient())
            ->setModule('ConverdoSiteManager.configurationCVD')
            ->get();
    }
}