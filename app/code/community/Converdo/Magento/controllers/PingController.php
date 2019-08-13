<?php

require_once __DIR__ . '/../../Common/bootstrap.php';

class Converdo_Magento_PingController extends Mage_Core_Controller_Front_Action
{
    /**
     * Returns information about the plugin and website.
     *
     * @return string
     */
    public function pingerAction()
    {
        $this->getResponse()
            ->setHeader('Content-type', 'application/json')
            ->setBody((new \Converdo\Common\Controllers\PingController())->ping());
    }
}
