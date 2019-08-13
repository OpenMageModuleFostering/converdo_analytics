<?php

class Converdo_Analytics_Support_Cookie
{
    public static function find()
    {
        foreach ($_COOKIE as $key => $cookie) {
            if (strpos($key, '_pk_id_' . Mage::getStoreConfig('converdo/analytics/site')) === false) {
                continue;
            }

            return $cookie;
        }

        return null;
    }
    
    protected static function factory($cookie)
    {
        
    }
}