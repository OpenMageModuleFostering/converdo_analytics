<?php

class Converdo_Analytics_PingController extends Mage_Core_Controller_Front_Action
{
    protected $output = [];

    public function pingerAction()
    {
        $this->output['plugin']['version'] = reset(Mage::getConfig()->getNode()->modules->Converdo_Analytics->version);

        if (! ($key = $this->getRequest()->getParam('key')) || $key !== Mage::getStoreConfig('converdo/analytics/site')) {
            return $this->response();
        }

        $api = file_get_contents('https://www.converdo.com/api/ping/' . Mage::getStoreConfig('converdo/analytics/site'));
        $api = json_decode($api);

        if (! $api || $api->error) {
            return $this->response();
        }

        $validSite = Mage::getStoreConfig('converdo/analytics/site') === $api->tokens->site;
        $validUser = Mage::getStoreConfig('converdo/analytics/token') === $api->tokens->user;
        $validEncryption = Mage::getStoreConfig('converdo/analytics/encryption') === $api->tokens->encryption;

        $this->output['validation']['enabled'] = (bool) Mage::getStoreConfigFlag('converdo/analytics/active');
        $this->output['validation']['valid'] = $validSite && $validUser && $validEncryption;

        $this->output['validation']['tokens']['site'] = $validSite;
        $this->output['validation']['tokens']['user'] = $validUser;
        $this->output['validation']['tokens']['encryption'] = $validEncryption;

        $this->output['info']['site'] = $api->site;
        $this->output['info']['url'] = $api->url;
        $this->output['info']['hash'] = $api->hash;

        return $this->response();
    }

    protected function response()
    {
        header('Content-Type: application/json;charset=utf-8');

        echo json_encode($this->output, true);
    }
}
