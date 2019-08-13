<?php

class Converdo_Analytics_Cookie_Manager
{
    /**
     * @var string|null
     */
    protected static $name = null;

    /**
     * @var Converdo_Analytics_Cookie_Model|null
     */
    protected static $cookie = null;

    /**
     * @return Converdo_Analytics_Cookie_Model|null;
     */
    public static function find()
    {
        if (self::$cookie) {
            return self::$cookie;
        }

        foreach ($_COOKIE as $key => $cookie) {
            if (strpos($key, '_pk_id_' . Mage::getStoreConfig('converdo/analytics/site')) === false) {
                continue;
            }

            $values = explode('.', $cookie);

            self::$name = str_replace('.pk.id', '_pk_id', str_replace('_', '.', $key));
            self::$cookie = self::factory($values);

            return self::$cookie;
        }

        return null;
    }


    public static function logEcommerce()
    {
        self::$cookie->setLastVisitedAt(time());
        self::$cookie->setUpdatedAt(time());

        self::update();
    }

    protected static function factory(array $values)
    {
        return (new Converdo_Analytics_Cookie_Model())
            ->setVisitor($values[0])
            ->setUuid($values[1])
            ->setCreatedAt($values[2])
            ->setVisitCount($values[3])
            ->setUpdatedAt($values[4])
            ->setLastVisitedAt($values[5]);
    }

    protected static function update()
    {
        setcookie(self::$name, self::$cookie, time() + (86400 * 30), "/");
    }
}